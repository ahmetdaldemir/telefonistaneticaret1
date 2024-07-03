<?php

namespace Amocart\Cart\Storage\Session;

 use Amocart\Cart\Storage\StorageContract;
 use Illuminate\Session\Store as Session;

class SessionRepository implements StorageContract
{

    /**
     * @var Cart
     */
    protected $session;

    /**
     * @param Cart $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Get all cart items stored on the session
     * @return array
     */
    public function get()
    {
        return $this->session->get('cart');
    }

    /**
     * Insert the data in the session.
     *
     * @return array
     */
    public function add($data)
    {
        $this->session->push('cart', $data);
    }

    /**
     * Update the item on the session
     * @param  integer $itemKey
     * @param  integer $quantity
     * @return void
     */
    public function put($itemKey, $quantity)
    {
        $storedData = $this->get();
        $storedData[$itemKey]['quantity'] = $quantity;
        $this->session->put('cart', $storedData);
    }

    /**
     * Delete the item from the storage
     * @param  integer $itemKey
     * @return void
     */
    public function delete($itemKey)
    {
        $storedData = $this->get();
        unset($storedData[$itemKey]);
        $this->session->put('cart', $storedData);
    }

    /**
     * Set the storage as an empty array
     * @return void
     */
    public function destroy()
    {
        $this->session->put('cart', []);
    }

    /**
     * Store the email for the Cart
     * @param string $email
     */
    public function setEmail($email)
    {
        $storedData = $this->get();
        $storedData['email'] = $email;
        $this->session->put('cart', $storedData);
    }
}
