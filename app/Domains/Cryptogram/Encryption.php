<?php

namespace App\Domains\Cryptogram;

use App\Domains\Cryptogram\Cryptogram;

abstract class Encryption extends Cryptogram
{
    abstract public function value();
    
    public function encryptedValue(): string
    {
        return openssl_encrypt(
            $this->value(),
            $this->method,
            $this->key,
            $this->options, 
            $this->iv
        );
    }
}