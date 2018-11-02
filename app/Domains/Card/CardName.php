<?php

namespace App\Domains\Card;

use App\Exceptions\InitializeException;
use App\Domains\Card\CardSpec;

class CardName
{
    private $cardName;

    public function __construct(string $cardName)
    {
        // if (! CardSpec::canCardName($cardName)) throw new InitializeException('Invalid value: ' . $cardName);
        // if (! CardSpec::canCardNameLength($cardName)) throw new InitializeException('Invalid length: ' . $cardName);

        $this->cardName = $cardName;
    }

    public function value(): string
    {
        return $this->cardName;
    }
}