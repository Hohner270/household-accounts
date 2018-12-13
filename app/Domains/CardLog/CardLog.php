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
    /**
     * @var CardLogId $id
     */
    private $id;

    /**
     * @var CardId $cardId
     */
    private $cardId;

    /**
     * @var StoreName $storeName
     */
    private $storeName;

    /**
     * @var UsedDate $usedDate
     */
    private $usedDate;

    /**
     * @var UsedPlace $usedPlace
     */
    private $usedPlace;

    /**
     * @var UsedContent $usedContent
     */
    private $usedContent;

    /**
     * @var UsedPrice $usedPrice
     */
    private $usedPrice;

    /**
     * @var Payment $payment
     */
    private $payment;

    /**
     * @var PaymentTimes $paymentTimes
     */
    private $paymentTimes;

    /**
     * @param CardLogId $id
     * @param CardId $cardId
     * @param StoreName $storeName
     * @param UsedDate $usedDate
     * @param UsedPlace $usedPlace
     * @param UsedContent $usedContent
     * @param UsedPrice $usedPrice
     * @param Payment $payment
     * @param PaymentTimes $paymentTime
     */
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

    /**
     * @return CardLogId
     */
    public function id(): CardLogId
    {
        return $this->id;
    }

    /**
     * @return CardId
     */
    public function cardId(): CardId
    {
        return $this->cardId;
    }

    /**
     * @return StoreName
     */
    public function storeName(): StoreName
    {
        return $this->storeName;
    }

    /**
     * @return UsedDate
     */
    public function usedDate(): UsedDate
    {
        return $this->usedDate;
    }

    /**
     * @return UsedPlace
     */
    public function usedPlace(): UsedPlace
    {
        return $this->usedPlace;
    }

    /**
     * @return UsedContent
     */
    public function usedContent(): UsedContent
    {
        return $this->usedContent;
    }

    /**
     * @return UsedPrice
     */
    public function usedPrice(): UsedPrice
    {
        return $this->usedPrice;
    }

    /**
     * @return Payment
     */
    public function payment(): Payment
    {
        return $this->payment;
    }

    /**
     * @return PaymentTimes
     */
    public function paymentTimes(): PaymentTimes
    {
        return $this->paymentTimes;
    }
}
