<?php

namespace App\Domains\CardLog;

class PaymentTimes
{
    /**
     * @var string $paymentTimes
     */
    private $paymentTimes;

    /**
     * @param string $paymentTimes
     */
    public function __construct(string $paymentTimes)
    {
        $this->paymentTimes = $paymentTimes;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->paymentTimes;
    }
}