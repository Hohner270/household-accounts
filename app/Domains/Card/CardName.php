<?php

namespace App\Domains\Card;

use App\Exceptions\InitializeException;
use App\Domains\Card\CardSpec;

class CardName
{
    /**
     * @var string $cardName
     */
    private $cardName;

    /**
     * @param string $cardName
     */
    public function __construct(string $cardName)
    {
        // if (! CardSpec::canCardName($cardName)) throw new InitializeException('Invalid value: ' . $cardName);
        // if (! CardSpec::canCardNameLength($cardName)) throw new InitializeException('Invalid length: ' . $cardName);

        $this->cardName = $cardName;
    }

    /**
     * @param string
     */
    public function value(): string
    {
        return $this->cardName;
    }
}