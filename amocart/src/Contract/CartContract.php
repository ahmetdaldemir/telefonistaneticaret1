<?php

namespace Amocart\Cart\Contract;

interface CartContract
{
    public function add($item);

    public function put($id, $quantity);

    public function all();

    public function isEmpty();

    public function destroy();

    public function totalItems();

    public function total();

    public function setEmail($email);
}
