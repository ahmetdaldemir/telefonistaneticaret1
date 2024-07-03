<?php

namespace Amocart\Cart\Repository;

use Amocart\Cart\Entities\Cart;
use Amocart\Cart\Entities\Items;
use Amocart\Cart\Storage\StorageContract;
use Illuminate\Support\Facades\Cookie;

class EloquentRepository implements StorageContract
{

    /**
     * @var $cart
     */
    protected $cart;

    /**
     * @param Cart $model
     */
    public function __construct()
    {
        $this->cart = $this->getOrCreate();
    }

    /**
     * Get all cart items stored on the model
     * @return array
     */
    public function get()
    {
        return $this->cart->items()->get()->toArray();
    }

    /**
     * Insert the data in the model.
     *
     * @return array
     */
    public function add($data)
    {
        $data['cart_id'] = $this->cart->id;
        Items::create($data);
    }

    /**
     * Update the item on the model
     * @param  integer $itemKey
     * @param  integer $quantity
     * @return void
     */
    public function put($itemKey, $quantity)
    {
        $items = $this->cart->items()->get();
        $items[$itemKey]->update(['quantity' => $quantity]);
    }

    /**
     * Delete the item from the storage
     * @param  integer $itemKey
     * @return void
     */
    public function delete($itemKey)
    {
        $items = $this->cart->items()->get();
        $items[$itemKey]->delete();
    }

    /**
     * Delete all items
     * @return void
     */
    public function destroy()
    {
        Items::where('cart_id', $this->cart->id)->delete();
    }

    /**
     * Store the email for the Cart
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->cart->update(['email' => $email]);
    }

    /**
     * Get or create the cart
     * @return Cart
     */
    protected function getOrCreate()
    {
        $cartId = Cookie::get('amocart');

        if ($cartId) return $this->getCartByCookie($cartId);

        return $this->createCart();
    }

    /**
     * Get the cart when the cookie id is set
     * @param  integer $id
     * @return Cart
     */
    protected function getCartByCookie($id)
    {
        $cart = Cart::find($id);

        if ($cart) return $cart;

        return $this->createCart();
    }

    /**
     * Create a new cart database record
     * @return Cart
     */
    protected function createCart()
    {
        $cart = new Cart;
        $cart->save();
        $cartId = $cart->id;
        Cookie::queue(Cookie::make('amocart', $cartId, 21600));
        return $cart;
    }
}
