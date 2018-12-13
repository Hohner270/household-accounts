<?php

namespace App\Infrastructures\Repositories\Domains\CardLog;

use App\Infrastructures\Eloquents\EloquentCardLog;
use App\Domains\CardLog\CardLogRepository;
use App\Domains\CardLog\CardLogs;

class EloquentCardLogRepositoryImpl implements CardLogRepository
{
    /**
     * @var EloquentCardLog Eloquentカードログモデル
     */
    private $eloquent;

    /**
     * @param EloquentCardLog Eloquentカードログモデル
     */
    public function __construct(EloquentCardLog $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param CardLogs カードログドメイン(複数)
     */
    public function store(CardLogs $cardLogs)
    {
        $cardLogCollection = $cardLogs->collect();

        $records = [];
        foreach ($cardLogCollection as $cardLog) {
            $records[] = [
                'user_id'       => 1,
                'card_id'       => 1,
                'store_name'    => $cardLog->storeName()->value(),
                'used_date'     => $cardLog->usedDate()->value(),
                'used_place'    => $cardLog->usedPlace()->value(),
                'used_content'  => $cardLog->usedContent()->value(),
                'used_price'    => $cardLog->usedPrice()->value(),
                'payment'       => $cardLog->payment()->value(),
                'payment_times' => $cardLog->paymentTimes()->value(),
            ];
        }

        $this->eloquent->insert($records);
    }
}
