<?php

namespace App\Services\CardScraping\EposCard;

use Goutte\Client;

use App\Domains\CardLog\CardLogRepository;

use App\Services\CardScraping\EposCard\ScrapeEposCard;

class ScrapeCurrentMonth extends ScrapeEposCard
{
    private $cardLogRepo;

    public function __construct(CardLogRepository $cardLogRepo)
    {
        $this->client = $client;
        $this->client->setHeader('User-Agent', self::USER_AGENT);

        $this->cardLogRepo = $cardLogRepo;        
    }

    public function __invoke()
    {
        $paymentPage = $this->getPaymentPage();
        $btnValueList = $this->getBtnValueList($paymentPage, 'thisButton');

        $csvList = $this->getPaymentCSV();
        $cardLogs = $this->convertToCardLogs($csvList);

        $this->cardLogRepo->store($cardLogs);
    }
}