<?php

namespace Amocart\Cart\Storage;

interface StorageContract
{
    public function get();

    public function add($data);

    public function put($itemKey, $quantity);

    public function delete($itemKey);

    public function destroy();

    public function setEmail($email);
}
