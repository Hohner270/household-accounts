<?php

namespace App\Infrastructures\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use App\Domains\CardLog\CardLogs;
use App\Domains\CardLog\CardLog;
use App\Domains\CardLog\CardLogId;
use App\Domains\CardLog\StoreName;
use App\Domains\CardLog\UsedDate;
use App\Domains\CardLog\UsedPlace;
use App\Domains\CardLog\UsedContent;
use App\Domains\CardLog\UsedPrice;
use App\Domains\CardLog\Payment;
use App\Domains\CardLog\PaymentTimes;

use App\Domains\Card\CardId;

class EloquentCardLog extends Model
{
    protected $table = 'card_logs';

    public function toDomains(Collection $records): CardLogs
    {
        return $records->reduce(function ($cardLogs, $record) {
            $cardLogs->add($record->toDomain());
            return $cardLogs;
        }, new CardLogs);
    }

    public function toDomain(): CardLog
    {
        return new CardLog(
            new CardLogId($this->id),
            new CardId($this->card_id),
            new StoreName($this->store_name),
            new UsedDate($this->used_date),
            new UsedPlace($this->used_place),
            new UsedContent($this->used_content),
            new UsedPrice($this->used_price),
            new Payment($this->payment),
            new PaymentTimes($this->payment_times)
        );
    }
}

