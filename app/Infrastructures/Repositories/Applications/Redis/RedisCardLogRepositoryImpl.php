<?php

namespace App\Infrastructures\Repositories\Applications\Redis;

use Illuminate\Redis\RedisManager;

use App\Domains\CardLog\SessionCardLogRepository;
use App\Domains\CardLog\CardLogs;

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
        return $this->redis->get(self::REDIS_KEY . $accountId->value());
    }

    public function store(CardLogs $cardLogs, AccountId $accountId)
    {
        $this->redis->set(self::REDIS_KEY . $accountId->value(), $cardLogs->collect());
    }
}