<?php

namespace Amocart\Cart;

use Amocart\Cart\Contract\CartContract;
use Amocart\Cart\Entities\Cart as CartModel;
use Amocart\Cart\Entities\Items;
use Illuminate\Support\Facades\Session;

class Cart implements CartContract
{
    protected $storage;
    protected $token;
    protected ?object $cart = null;

    /**
     * Create a new Cart instance.
     */
    public function __construct()
    {
        if (auth()->guard('web')->check()) {
            $this->storage = CartModel::where('customer_id', auth()->guard('web')->user()->id)->first();
        }
        if (!$this->storage) {
            $this->storage = new CartModel();
        }

        // Başlangıç değeri olarak boş bir dizi atıyoruz.
        $this->cart = (object)['items' => []];
    }

    /**
     * @return object
     */
    public function handle(): object
    {
        return $this->cart;
    }

    /**
     * Check if the item exists in the cart
     * If it exists, increments the item
     * Otherwise. Creates a new one.
     *
     * @param array $data
     *
     * @return bool
     */
    public function add($data = []): bool
    {
        if (isset($data['product_id'])) {
            $data = [$data];
        }

        $items = $this->processItems($data);
        return !is_null($items);
    }

    /**
     * Update an item.
     *
     * @param int $id
     * @param int $quantity
     *
     * @return bool
     */
    public function put($id, $quantity): bool
    {
        $itemKey = $this->findBy('id', $id);

        if ($itemKey === false) {
            return false;
        }

        $this->updateOrDelete($itemKey, $quantity);

        return true;
    }

    /**
     * Destroy the cart.
     */
    public function destroy()
    {
        $this->storage->delete();
        Items::where('cart_id', $this->storage->id)->delete();
    }

    public function delete($cart_id, $id)
    {
        Items::where('cart_id', $cart_id)->where('product_id', $id)->delete();
    }

    /**
     * Check if the cart is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return count($this->cart->items) == 0;
    }

    /**
     * Check a list with the cart items.
     */
    public function all(): bool|array
    {
        $token = Session::getId();

        if (auth()->guard('web')->check()) {
            $storage = $this->storage->where('customer_id', auth()->guard('web')->user()->id)->first();
            if (is_null($storage)) {
                return false;
            }
            $this->cart->items = Items::where('cart_id', $storage->id)->get();
            $data['items'] = $this->cart->items;
            $data['count'] = $this->totalItems();
            return $data;
        } else {
            $storage = $this->storage->where('token', $token)->first();
            if (is_null($storage)) {
                return false;
            }

            $this->cart->items = Items::where('cart_id', $storage->id)->get();
            $data['items'] = $this->cart->items;
            $data['count'] = $this->totalItems();
            return $data;
        }
    }

    /**
     * Sum the price of the items in the cart.
     *
     * @return float
     */
    public function total(): float
    {
        $amount = 0;
        $all = $this->all();
         foreach ($all['items'] as $item) {
            $amount += $item->price * $item->quantity;
        }
        return $amount;
    }

    /**
     * Sum the total items in the cart.
     *
     * @return int
     */
    public function totalItems(): int
    {
        $count = [];

        foreach ($this->cart->items as $item) {
            $count[] = $item->id;
        }

        return count($count);
    }

    /**
     * Set the email for the cart
     * @param string $email
     *
     * @return void
     */
    public function setEmail($email)
    {
        $this->validate(['email' => $email]);

        $this->cart->email = $email;
        $this->storage->setEmail($email);
    }

    /**
     * Check if an item exists in the collection.
     * If so, returns the key.
     *
     * @return bool
     */
    protected function findBy($value)
    {
        return $this->storage->find($value);
    }

    /**
     * Process the list of items to insert in the cart.
     *
     * @return array|null
     */
    protected function processItems($data)
    {
        $token = Session::getId();

        if (!auth()->guard('web')->check()) {
            $itemKey = $this->storage->where('token', $token)->first();
        } else {
            $itemKey = $this->storage->where('customer_id', auth()->guard('web')->user()->id)->first();
        }

        if (is_null($itemKey)) {
            return $this->createItem($token, $data);
        } else {
            $itemKey = $this->findBy($itemKey->id);
            return $this->incrementItem($itemKey, $data);
        }
    }

    /**
     * If the item already exists in the cart, updates the quantity.
     */
    protected function incrementItem($itemKey, $data)
    {
        $this->storageItem = Items::where('cart_id', $itemKey->id)->where('product_id', $data[0]['product_id'])->first();
        if (is_null($this->storageItem)) {
            return $this->insertChild($itemKey, $data);
        }
        $quantity = $this->storageItem->quantity + $data[0]['quantity'];
        return $this->updateOrDelete($itemKey, $quantity, $data[0]['product_id']);
    }

    public function insertChild($itemKey, $data = [])
    {
        foreach ($data as $item) {
            $this->storageItem = new Items();
            $this->storageItem->cart_id = $itemKey->id;
            $this->storageItem->product_id = $item['product_id'];
            $this->storageItem->sku = $item['sku'];
            $this->storageItem->description = $item['description'];
            $this->storageItem->price = $item['price'];
            $this->storageItem->quantity = $item['quantity'];
            $this->storageItem->save();
        }

        return true;
    }

    /**
     * Creates a new item.
     *
     * @return array
     */
    protected function createItem($token, $data = []): array
    {
        $this->storage->token = $token;
        $this->storage->customer_id = auth()->guard('web')->user()->id ?? null;
        $this->storage->save();
        $id = $this->storage->id;
        foreach ($data as $item) {
            $this->storageItem = new Items();
            $this->storageItem->cart_id = $id;
            $this->storageItem->product_id = $item['product_id'];
            $this->storageItem->sku = $item['sku'];
            $this->storageItem->description = $item['description'];
            $this->storageItem->price = $item['price'];
            $this->storageItem->quantity = $item['quantity'];
            $this->storageItem->save();
        }
        return $data;
    }

    /**
     * Update the item quantity or remove the item
     * if the quantity is zero.
     */
    protected function updateOrDelete($itemKey, $quantity, $product_id)
    {
        if ($quantity == 0) {
            Items::where('cart_id', $itemKey->cart_id)->where('product_id', $product_id)->delete();
        } else {
            $this->storageItem->quantity = $quantity;
            $this->storageItem->save();
        }
        return $this->storageItem;
    }

    public function cartTrush()
    {
        $token = Session::getId();

        if (!auth()->guard('web')->check()) {
            $itemKey = $this->storage->where('token', $token)->first();
        } else {
            $itemKey = $this->storage->where('customer_id', auth()->guard('web')->user()->id)->first();
        }
        if($itemKey)
        {
            Items::where('cart_id', $itemKey->cart_id)->delete();
        }
    }


    /**
     * Creates a hash.
     *
     * @return string
     */
    protected function hash($value): string
    {
        return md5($value);
    }

    /**
     * Validate the item.
     *
     * @param array $fields
     *
     * @throws \InvalidArgumentException
     */
    protected function validate($fields)
    {
        foreach ($fields as $field => $value) {
            if ($field == 'parent_id' || $field == 'parent_description') {
                continue;
            }

            switch ($field) {
                case 'product_id':
                    if (empty($value)) {
                        throw new \InvalidArgumentException('Invalid product_id for the item');
                    }
                    break;
                case 'description':
                    if (empty($value)) {
                        throw new \InvalidArgumentException('Invalid Description for the item');
                    }
                    break;
                case 'quantity':
                    if (!preg_match('/^[+]?\d+([.]\d+)?$/', $value)) {
                        throw new \InvalidArgumentException('Invalid Quantity for the item');
                    }
                    break;
                case 'price':
                    if (!preg_match('/^-?(?:\d+|\d*\.\d+)$/', $value)) {
                        throw new \InvalidArgumentException('Invalid Price for the item');
                    }
                    break;
                case 'options':
                    if (!is_array($value)) {
                        throw new \InvalidArgumentException('Invalid Options for the item');
                    }
                    break;
                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        throw new \InvalidArgumentException('Invalid Email Address');
                    }
                    break;
                default:
                    throw new \InvalidArgumentException();
            }
        }
    }
}
