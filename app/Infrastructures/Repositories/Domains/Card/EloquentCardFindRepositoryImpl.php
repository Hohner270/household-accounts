<?php

namespace App\Infrastructures\Repositories\Domains\Card;

use App\Domains\Card\Card;
use App\Domains\Card\Cards;
use App\Domains\Card\CardId;
use App\Domains\Card\CardFindRepository;

use App\Infrastructures\Eloquents\EloquentCard;

class EloquentCardFindRepositoryImpl implements CardFindRepository
{
    private $eloquent;

    public function __construct(EloquentCard $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findById(CardId $cardId): Card
    {
        $card = $this->eloquent->find($cardId->value());
        return $card->toDomain();
    }

    public function findAll(): Cards
    {
        $records = $this->eloquent->all();
        $cards = $this->eloquent->toDomains($records);
        return $cards;
    }
}
