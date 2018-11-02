<?php

namespace App\Domains\CardLog;

use App\Domains\Card\CardId;
use App\Domains\CardLog\CardLogId;
use App\Domains\CardLog\StoreName;
use App\Domains\CardLog\UsedDate;
use App\Domains\CardLog\UsedPlace;
use App\Domains\CardLog\UsedContent;
use App\Domains\CardLog\UsedPrice;
use App\Domains\CardLog\Payment;
use App\Domains\CardLog\PaymentTimes;

class CardLog
{
    const COLUMN_KEYS = [
        'storeName',
        'usedDate',
        'usedPlace',
        'usedContent',
        'usedPrice',
        'payment',
        'paymentTimes',
    ];
    
    private $id;
    private $cardId;
    private $storeName;
    private $usedDate;
    private $usedPlace;
    private $usedContent;
    private $usedPrice;
    private $payment;
    private $paymentTimes;

    public function __construct(
        CardLogId $id, 
        CardId $cardId,
        StoreName $storeName, 
        UsedDate $usedDate, 
        UsedPlace $usedPlace, 
        UsedContent $usedContent, 
        UsedPrice $usedPrice, 
        Payment $payment, 
        PaymentTimes $paymentTimes
    ) {
        $this->id = $id;
        $this->cardId = $cardId;
        $this->storeName = $storeName;
        $this->usedDate = $usedDate;
        $this->usedPlace = $usedPlace;
        $this->usedContent = $usedContent;
        $this->usedPrice = $usedPrice;
        $this->payment = $payment;
        $this->paymentTimes = $paymentTimes;
    }

    public function id(): CardLogId
    {
        return $this->id;
    }

    public function cardId(): CardId
    {
        return $this->cardId;
    }

    public function storeName(): StoreName
    {
        return $this->storeName;
    }

    public function usedDate(): UsedDate
    {
        return $this->usedDate;
    }

    public function usedPlace(): UsedPlace
    {
        return $this->usedPlace;
    }

    public function usedContent(): UsedContent
    {
        return $this->usedContent;
    }

    public function usedPrice(): UsedPrice
    {
        return $this->usedPrice;
    }

    public function payment(): Payment
    {
        return $this->payment;
    }

    public function paymentTimes(): PaymentTimes
    {
        return $this->paymentTimes;
    }
}