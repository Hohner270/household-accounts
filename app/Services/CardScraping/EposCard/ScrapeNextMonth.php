<?php

namespace App\Services\CardScraping\EposCard;

use Goutte\Client;

use App\Services\CardScraping\EposCard\ScrapeEposCard;

use App\Domains\Account\AccountId;

use App\Domains\CardLog\SessionCardLogRepository;

class ScrapeNextMonth extends ScrapeEposCard
{
    private $sessionRepo;

    public function __construct(SessionCardLogRepository $sessionRepo)
    {
        $this->sessionRepo = $sessionRepo;
    }

    public function __invoke(AccountId $accountId, EncryptedCardAccountId $encryptedCardAccountId, EncryptedCardAccountPassword $encryptedCardAccountPassword)
    {
        $paymentPage = $this->getPaymentPage(
            $this->client, 
            $encryptedCardAccountId, 
            $encryptedCardAccountPassword
        );
        
        $btnValueList = $this->getBtnValueList($paymentPage, 'nextButton');

        $csvList = $this->getPaymentCSV($this->client);
        $cardLogs = $this->convertToCardLogs($csvList);

        $this->sessionRepo->store($cardLogs, $accountId);
    }
}