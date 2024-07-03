<?php

namespace app\Helpers;

class HashHelper
{
    public function generateHash(...$calc)
    {

        $hashString = '';
        foreach ($calc as $paramName) {
            $hashString .= $paramName;
        }


        $hashingbytes = hash("sha512", ($hashString), true);
        return base64_encode($hashingbytes);
    }
}
