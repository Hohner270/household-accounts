<?php

namespace App\Domains\CardLog;

class Payment
{
    /**
     * @var int $payment
     */
    private $payment;

    /**
     * @param int $payment
     */
    public function __construct(int $payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->payment;
    }
}