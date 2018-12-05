<?php

namespace App\Infrastructures\Repositories\Applications\Redis;

use Illuminate\Redis\RedisManager;

use App\Domains\Card\CardId;

use App\Domains\CardLog\CardLog;
use App\Domains\CardLog\CardLogs;
use App\Domains\CardLog\CardLogId;
use App\Domains\CardLog\StoreName;
use App\Domains\CardLog\UsedDate;
use App\Domains\CardLog\UsedPlace;
use App\Domains\CardLog\UsedContent;
use App\Domains\CardLog\UsedPrice;
use App\Domains\CardLog\Payment;
use App\Domains\CardLog\PaymentTimes;
use App\Domains\CardLog\SessionCardLogRepository;

use App\Domains\Account\AccountId;

class RedisCardLogRepositoryImpl implements SessionCardLogRepository
{
    const REDIS_KEY = 'cardLogs';

    private $redis;
    
    public function __construct(RedisManager $redis)
    {
        $this->redis = $redis;
    }

    public function find(AccountId $accountId): CardLogs
    {
        $cardLogList = json_decode($this->redis->get(self::REDIS_KEY . $accountId->value()));
        return $this->toDomains($cardLogList);
    }

    public function store(CardLogs $cardLogs, AccountId $accountId)
    {
        $cardLogList = [];
        foreach ($cardLogs->collect() as $cardLog) {
            $cardLogList[] = [
                'id'           => $cardLog->id()->value(),
                'cardId'       => $cardLog->cardId()->value(),
                'payment'      => $cardLog->payment()->value(),
                'paymentTimes' => $cardLog->paymentTimes()->value(),
                'storeName'    => $cardLog->storeName()->value(),
                'usedContent'  => $cardLog->usedContent()->value(),
                'usedDate'     => $cardLog->usedDate()->value(),
                'usedPlace'    => $cardLog->usedPlace()->value(),
                'usedPrice'    => $cardLog->usedPrice()->value(),
            ];
        }

        $this->redis->set(self::REDIS_KEY . $accountId->value(), json_encode($cardLogList));
    }

    public function toDomains(array $cardLogList): CardLogs
    {
        $cardLogs = new CardLogs;
        foreach ($cardLogList as $cardLog) {
            $cardLogs->add(
                new CardLog(
                    new CardLogId($cardLog->id),
                    new CardId($cardLog->cardId),
                    new StoreName($cardLog->storeName),
                    new UsedDate($cardLog->usedDate),
                    new UsedPlace($cardLog->usedPlace),
                    new UsedContent($cardLog->usedContent),
                    new UsedPrice($cardLog->usedPrice),
                    new Payment($cardLog->payment),
                    new PaymentTimes($cardLog->paymentTimes)
                )
            );
        }

        return $cardLogs;
    }
}