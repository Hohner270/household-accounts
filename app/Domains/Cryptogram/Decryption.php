<?php

namespace App\Domains\Cryptogram;

use App\Domains\Cryptogram\Cryptogram;

abstract class Decryption extends Cryptogram
{
    abstract public function value();

    public function decrypt(): string
    {
        return openssl_decrypt(
            $this->value(),
            parent::$method, 
            parent::$key, 
            parent::$options, 
            parent::$iv
        );
    }
}