<?php

namespace App\Services\CardScraping\EposCard;

use Goutte\Client;

use App\Services\CardScraping\ScrapeCard;

use App\Domains\CardLog\CardLogs;
use App\Domains\CardLog\CardLogId;
use App\Domains\CardLog\CardLog;
use App\Domains\CardLog\StoreName;
use App\Domains\CardLog\UsedDate;
use App\Domains\CardLog\UsedPlace;
use App\Domains\CardLog\UsedContent;
use App\Domains\CardLog\UsedPrice;
use App\Domains\CardLog\Payment;
use App\Domains\CardLog\PaymentTimes;
use App\Domains\CardLog\CardLogRepository;

use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;

abstract class ScrapeEposCard implements ScrapeCard
{
    const EPOS_CARD_ID = 1;
    const USER_AGENT = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/547.36 (KHTML, like Gecko) Chrome';
    
    const LOGIN_URI = 'https://www.eposcard.co.jp/member/index.html?from=top_header_rp';
    const PAYMENT_URI = 'https://www.eposcard.co.jp/memberservice/pc/paymentamountreference/payment_reference_preload.do';
    const PAYMENT_DETAIL_URI = 'https://www.eposcard.co.jp/memberservice/pc/paymentamountreference/payment_reference_dispatch.do';
    const CSV_REQUEST_URI = 'https://www.eposcard.co.jp/memberservice/pc/paymentamountreference/payment_detail_dispatch.do';

    protected $cardLogRepo;
    protected $client;

    public function __construct(CardLogRepository $cardLogRepo, Client $client)
    {
        $this->cardLogRepo = $cardLogRepo;
        $this->client = $client;
        $this->client->setHeader('User-Agent', self::USER_AGENT);
    }

    protected function getPaymentPage($client, EncryptedCardAccountId $encryptedCardAccountId, EncryptedCardAccountPassword $encryptedCardAccountPassword)
    {
        $loginPage = $client->request('GET', self::LOGIN_URI);
        $loginForm = $loginPage->filter('form[name=loginForm]')->form();

        $loginForm['loginId'] = $encryptedCardAccountId->decrypt();
        $loginForm['passWord'] = $encryptedCardAccountPassword->decrypt();
        
        $client->submit($loginForm);

        return $client->request('GET', self::PAYMENT_URI);
    }

    protected function getBtnValueList($paymentPage, $targetBtn): array
    {
        if (! $paymentPage->filter("input[name={$targetBtn}]")) throw new \Exception('エポスカードの何らかの不具合（未払い含む）によりログを取得できませんでした。');
        
        return [
            $targetBtn => $paymentPage->filter("input[name={$targetBtn}]")->attr('value'),
        ];
    }

    protected function getPaymentCSV($client): array
    {
        $paymentDetailPage = $client->request('POST', self::PAYMENT_DETAIL_URI, $btnValueList);
        $csvDownloadButton = $paymentDetailPage->filter('input[name=csvDownloadButton]')->attr('value');
    
        $client->request('POST', self::CSV_REQUEST_URI, ['csvDownloadButton' => $csvDownloadButton]);
        $content = $client->getResponse()->getContent();
        
        if (! $content) throw new \Exception('支払いログを取得できませんでした。');

        $csv = mb_convert_encoding($content, "UTF-8", 'Windows-31J');
        $csvList = explode("\n", preg_replace('/\r\n|\r|\n/', "\n", $csv));

        array_shift($csvList);
        array_pop($csvList);
        array_pop($csvList);

        return $csvList;
    }

    protected function convertToCardLogs(array $csvList): CardLogs
    {
        $cardLogs = new CardLogs;
        foreach ($csvList as $csv) {
            $csvRecord = array_combine(CardLog::COLUMN_KEYS,  explode(',', $csv));
            $csvRecord['usedDate'] = preg_replace('/年|月/', '-', $csvRecord['usedDate']);
            $csvRecord['usedDate'] = preg_replace('/日/', '', $csvRecord['usedDate']);

            $cardLog = new CardLog(
                CardLogId::of(),
                new CardId(self::EPOS_CARD_ID),
                new StoreName($csvRecord['storeName']),
                new UsedDate($csvRecord['usedDate']),
                new UsedPlace($csvRecord['usedPlace']),
                new UsedContent($csvRecord['usedContent']),
                new UsedPrice($csvRecord['usedPrice']),
                new Payment($csvRecord['payment']),
                new PaymentTimes($csvRecord['paymentTimes'])
            );
            $cardLogs->add($cardLog);
        }

        return $cardLogs;
    }
}