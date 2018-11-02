<?php

namespace App\Domains\CardLog;

class Payment
{
    private $payment;

    public function __construct(int $payment)
    {
        $this->payment = $payment;
    }

    public function value(): int
    {
        return $this->payment;
    }
}