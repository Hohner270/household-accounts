<?php

namespace App\Services\CardScraping\EposCard;

use Goutte\Client;

use App\Services\CardScraping\EposCard\ScrapeEposCard;

use App\Domains\Account\AccountId;

use App\Domains\CardLog\SessionCardLogRepository;
use App\Domains\CardLog\CardLogs;

use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;

class ScrapeNextMonth extends ScrapeEposCard
{
    private $sessionRepo;

    public function __construct(Client $client, SessionCardLogRepository $sessionRepo)
    {
        $this->client = $client;
        $this->client->setHeader('User-Agent', self::USER_AGENT);

        $this->sessionRepo = $sessionRepo;
    }

    public function __invoke(AccountId $accountId, EncryptedCardAccountId $encryptedCardAccountId, EncryptedCardAccountPassword $encryptedCardAccountPassword): CardLogs
    {
        $paymentPage = $this->getPaymentPage(
            $encryptedCardAccountId,
            $encryptedCardAccountPassword
        );

        $btnValueList = $this->getBtnValueList($paymentPage, 'nextButton');

        $csvList = $this->getPaymentCSV($btnValueList);
        $cardLogs = $this->convertToCardLogs($csvList);

        $this->sessionRepo->store($cardLogs, $accountId);
        return $cardLogs;
    }
}