<?php

namespace App\Infrastructures\Repositories\Domains\CardAccount;

use App\Domains\Account\AccountId;

use App\Domains\Card\CardId;

use App\Domains\CardAccount\CardAccount;
use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;
use App\Domains\CardAccount\CardAccountRepository;

use App\Infrastructures\Eloquents\EloquentCardAccount;

class EloquentCardAccountRepositoryImpl implements CardAccountRepository
{
    private $eloquent;

    public function __construct(EloquentCardAccount $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function store(CardId $cardId, AccountId $accountId, EncryptedCardAccountId $encryptedCardAccountId, EncryptedCardAccountPassword $encryptedCardAccountPassword): CardAccount
    {
        $this->eloquent->user_id = $accountId->value();
        $this->eloquent->card_id = $cardId->value();
        $this->eloquent->card_sign_in_id = $encryptedCardAccountId->value();
        $this->eloquent->card_sign_in_password = $encryptedCardAccountPassword->value();
        $this->eloquent->save();

        return $this->eloquent->toDomain();
    }
}