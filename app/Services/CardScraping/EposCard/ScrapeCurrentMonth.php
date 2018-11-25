<?php

namespace App\Services\CardScraping\EposCard;

use App\Services\CardScraping\EposCard\ScrapeEposCard;

class ScrapeCurrentMonth extends ScrapeEposCard
{
    public function _invoke()
    {
        $paymentPage = $this->getPaymentPage($this->client);
        $btnValueList = $this->getBtnValueList($paymentPage, 'thisButton');

        $csvList = $this->getPaymentCSV($this->client);
        $cardLogs = $this->convertToCardLogs($csvList);

        $this->cardLogRepo->store($cardLogs);
    }
}