<?php

namespace App\Services\CardScraping\EposCard;

use App\Services\CardScraping\EposCard\ScrapeEposCard;

class ScrapeCurrentMonth extends ScrapeEposCard
{
    // public function __construct(CardLogRepository $cardLogRepo)
    // {
    //     $this->cardLogRepo = $cardLogRepo;
    // }

    public function _invoke()
    {
        $client = new Client();
        $client->setHeader('User-Agent','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/547.36 (KHTML, like Gecko) Chrome');

        $paymentPage = $this->getPaymentPage($client);
        $btnValueList = $this->getBtnValueList($paymentPage, 'nextButton');

        $csvList = $this->getPaymentCSV($client);
        $cardLogs = convertToCardLogs($csvList);

        $this->cardLogRepo->store($cardLogs);
    }
}