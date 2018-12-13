<?php

namespace App\Infrastructures\Repositories\Domains\Card;

use App\Domains\Card\Card;
use App\Domains\Card\Cards;
use App\Domains\Card\CardId;
use App\Domains\Card\CardFindRepository;

use App\Infrastructures\Eloquents\EloquentCard;

class EloquentCardFindRepositoryImpl implements CardFindRepository
{
    /**
     * @var EloquentCard Eloquentカードモデル
     */
    private $eloquent;

    /**
     * @param EloquentCard Eloquentカードモデル
     */
    public function __construct(EloquentCard $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param CardId カードID
     * @return Card カードドメイン
     */
    public function findById(CardId $cardId): Card
    {
        $card = $this->eloquent->find($cardId->value());
        return $card->toDomain();
    }

    /**
     * @return Cards カードドメイン(複数)
     */
    public function findAll(): Cards
    {
        $records = $this->eloquent->all();
        $cards = $this->eloquent->toDomains($records);
        return $cards;
    }
}
