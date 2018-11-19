<?php

namespace App\Domains\Cryptogram;

abstract class Cryptogram
{
    protected $method = 'aes-256-cbc';
    protected $key = 'secret key';
    protected $options = OPENSSL_RAW_DATA;
    protected $iv = '1234567890123456';
}