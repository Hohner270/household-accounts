<?php

namespace App\Services\CardScraping;

use Goutte\Client;

use App\Services\CardScraping\ScrapingCard;

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

class ScrapingEposCard extends ScrapingCard
{
    // ドメインに持たせる
    const EPOS_CARD_ID = 1;

    private $cardLogRepo;
    private $card;

    public function __construct(CardLogRepository $cardLogRepo)
    {
        $this->cardLogRepo = $cardLogRepo;
    }

    public function __invoke()
    {
        
        $btn = 'thisButton';

        $paymentPage = $this->getPaymentPage();
        $btnValueList = $this->getBtnValueList($paymentPage, $btn);

        $csvList = $this->getPaymentCSV();
        $cardLogs = convertToCardLogs($csvList);

        $this->cardLogRepo->registerCardLogs($cardLogs);
    }

    private function getBtnValueList($paymentPage, $targetBtn): array
    {
        if (! $paymentPage->filter("input[name={$targetBtn}]")) throw new \Exception('エポスカードの何らかの不具合（未払い含む）によりログを取得できませんでした。');
        
        return [
            $targetBtn => $paymentPage->filter("input[name={$targetBtn}]")->attr('value'),
        ];
    }

    private function getPaymentPage()
    {
        $client = new Client();
        $loginPage = $client->request('GET', 'https://www.eposcard.co.jp/member/index.html?from=top_header_rp');
        $loginForm = $loginPage->filter('form[name=loginForm]')->form();
        $loginForm['loginId'] = 'aaaa';
        $loginForm['passWord'] = 'aaaa';
        $client->submit($loginForm);

        return $client->request('GET', 'https://www.eposcard.co.jp/memberservice/pc/paymentamountreference/payment_reference_preload.do');
    }

    private function getPaymentCSV()
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

    private function convertToCardLogs(): CardLogs
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