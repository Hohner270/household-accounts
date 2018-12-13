<?php

namespace App\Domains\Cryptogram;

use App\Domains\Cryptogram\Cryptogram;

abstract class Decryption extends Cryptogram
{
    abstract public function value();

    /**
     * @return string
     */
    public function decryptedValue(): string
    {
        return openssl_decrypt(
            $this->value(),
            $this->method, 
            $this->key, 
            $this->options, 
            $this->iv
        );
    }
}