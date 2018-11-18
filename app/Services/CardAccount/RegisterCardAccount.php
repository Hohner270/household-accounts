<?php

namespace App\Services\CardAccount;

use App\Domains\CardAccount\CardAccount;
use App\Domains\CardAccount\CardAccountId;
use App\Domains\CardAccount\CardAccountPassword;
use App\Domains\CardAccount\CardAccountRepository;

use App\Domains\Card\CardId;
use App\Domains\Account\AccountId;

use App\Domains\Card;

class RegisterCardAccount
{
    private $cardAccountRepo;

    public function __construct(CardAccountRepository $cardAccountRepo)
    {
        $this->cardAccountRepo = $cardAccountRepo;
    }

    public function __invoke(CardId $cardId, AccountId $accountId, CardAccountId $cardAccountId, CardAccountPassword $cardAccountPassword): CardAccount
    {
        return $this->cardAccountRepo->store(
            $cardId,
            $accountId,
            $cardSignInId,
            $cardSignInPassword
        );
    }
}