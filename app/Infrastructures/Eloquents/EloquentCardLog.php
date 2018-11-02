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
            $cardLogs->add($this->toDomain($record));
            return $cardLogs;
        }, new CardLogs);
    }

    public function toDomain(self $record): CardLog
    {
        return new CardLog(
            new CardLogId($record->id),
            new CardId($record->card_id),
            new StoreName($record->store_name),
            new UsedDate($record->used_date),
            new UsedPlace($record->used_place),
            new UsedContent($record->used_content),
            new UsedPrice($record->used_price),
            new Payment($record->payment),
            new PaymentTimes($record->payment_times)
        );
    }
}

