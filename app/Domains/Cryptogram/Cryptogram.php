<?php

namespace App\Domains\Cryptogram;

abstract class Cryptogram
{
    /**
     * @var string $method
     */
    protected $method = 'AES-256-CBC';
    
    /**
     * @var string $key
     */
    protected $key = 'secret key';

    /**
     * @var string $options
     */
    protected $options = OPENSSL_RAW_DATA;

    /**
     * @var string $iv
     */
    protected $iv = '1234567890123456';
}