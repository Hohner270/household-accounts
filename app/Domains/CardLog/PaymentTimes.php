<?php

namespace App\Domains\CardLog;

class PaymentTimes
{
    private $paymentTimes;

    public function __construct(string $paymentTimes)
    {
        $this->paymentTimes = $paymentTimes;
    }

    public function value(): string
    {
        return $this->paymentTimes;
    }
}