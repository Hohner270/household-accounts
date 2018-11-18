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

use App\Domains\Card\CardId;

abstract class ScrapeEposCard implements ScrapeCard
{
    const EPOS_CARD_ID = 1;

    protected $cardLogRepo;

    public function __construct(CardLogRepository $cardLogRepo)
    {
        $this->cardLogRepo = $cardLogRepo;
    }

    protected function getPaymentPage($client, $cardServiceId, $cardServicePassword)
    {
        $loginPage = $client->request('GET', 'https://www.eposcard.co.jp/member/index.html?from=top_header_rp');
        $loginForm = $loginPage->filter('form[name=loginForm]')->form();

        $loginForm['loginId'] = $cardServiceId;
        $loginForm['passWord'] = $cardServicePassword;
        
        $client->submit($loginForm);

        return $client->request('GET', 'https://www.eposcard.co.jp/memberservice/pc/paymentamountreference/payment_reference_preload.do');
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
        $paymentDetailPage = $client->request('POST', 'https://www.eposcard.co.jp/memberservice/pc/paymentamountreference/payment_reference_dispatch.do', $btnValueList);
        $csvDownloadButton = $paymentDetailPage->filter('input[name=csvDownloadButton]')->attr('value');
    
        $client->request('POST', 'https://www.eposcard.co.jp/memberservice/pc/paymentamountreference/payment_detail_dispatch.do', ['csvDownloadButton' => $csvDownloadButton]);
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