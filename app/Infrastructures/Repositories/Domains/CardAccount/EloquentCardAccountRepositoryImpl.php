<?php

namespace App\Infrastructures\Repositories\Domains\CardAccount;

use App\Domains\CardAccount\CardAccountRepository;

use App\Infrastructures\Eloquents\EloquentCardAccount;

class EloquentCardAccountRepositoryImpl implements CardAccountRepository
{
    private $eloquent;

    public function __construct(EloquentCardAccount $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function store(AccountId $accountId, CardId $cardId, CardAccountId $cardAccountId, CardAccountPassword $cardAccountPassword): CardAccount
    {
        $this->eloquent->user_id = $accountId;
        $this->eloquent->card_id = $cardId;
        $this->eloquent->card_sign_in_id = $cardAccountId;
        $this->eloquent->card_sign_in_password = $cardAccountPassword;
        $this->eloquent->save();

        return $this->eloquent->toDomain();
    }
}