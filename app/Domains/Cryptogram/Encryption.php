<?php

namespace App\Domains\Cryptogram;

use App\Domains\Cryptogram\Cryptogram;

abstract class Encryption extends Cryptogram
{
    abstract public function value();
    
    public function encrypt(): string
    {
        return openssl_encrypt(
            $this->value(),
            parent::$method, 
            parent::$key, 
            parent::$options, 
            parent::$iv
        );
    }
}