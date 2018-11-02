<?php

namespace App\Infrastructures\Eloquents;

use Illuminate\Database\Eloquent\Model;

use App\Domains\Card\Card;
use App\Domains\Card\CardId;
use App\Domains\Card\CardName;

class EloquentCard extends Model
{
    protected $table = 'cards';

    public function toDomain($record): Card
    {
        return new Card(
            new CardId($record->id),
            new CardName($record->name)
        );
    }
}
