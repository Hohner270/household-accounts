<?php

namespace App\Infrastructures\Repositories\Card;

use App\Domains\Card\Card;
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
        return $this->eloquent->toDomain($card);
    }
}
