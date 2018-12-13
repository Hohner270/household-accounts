<?php

namespace App\Infrastructures\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use App\Domains\Card\Card;
use App\Domains\Card\Cards;
use App\Domains\Card\CardId;
use App\Domains\Card\CardName;

class EloquentCard extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'cards';

    /**
     * @return Card カードドメイン
     */
    public function toDomain(): Card
    {
        return new Card(
            new CardId($this->id),
            new CardName($this->name)
        );
    }

    /**
     * @param Collection コレクション
     * @return Cards カードドメイン（複数）
     */
    public function toDomains(Collection $records): Cards
    {
        return $records->reduce(function ($cards, $record) {
            $cards->add($record->toDomain());
            return $cards;
        }, new Cards);
    }
}
