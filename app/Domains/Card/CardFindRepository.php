<?php

namespace App\Domains\Card;

interface CardFindRepository
{
    public function findById(CardId $cardId): Card;
    public function findAll(): Cards;
}
