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
    /**
     * @var string redisキー
     */
    const REDIS_KEY = 'cardLogs';

    /**
     * @var RedisManager RedisClient
     */
    private $redis;

    /**
     * @param RedisManager RedisClient
     */
    public function __construct(RedisManager $redis)
    {
        $this->redis = $redis;
    }

    /**
     * @param AccountId アカウントID
     * @return CardLogs カードログドメイン（複数）
     */
    public function find(AccountId $accountId): CardLogs
    {
        $cardLogList = json_decode($this->redis->get(self::REDIS_KEY . $accountId->value()));
        return $this->toDomains((array)$cardLogList);
    }

    /**
     * @param CardLogs カードログドメイン（複数）
     * @param AccountId アカウントID
     */
    public function store(CardLogs $cardLogs, AccountId $accountId)
    {
        $this->redis->set(self::REDIS_KEY . $accountId->value(), $cardLogs->toJson());
    }

    /**
     * @param array カードログ（複数）
     * @return CardLogs　カードログドメイン（複数）
     */
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