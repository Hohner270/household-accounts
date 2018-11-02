<?php

namespace App\Domains\CardLog;

// use App\Domains\Stringize;

class CardLogSpec
{
    public function canCardType(int $cardType): bool
    {
        \App::make(CardFindRepository::class);
    }
}