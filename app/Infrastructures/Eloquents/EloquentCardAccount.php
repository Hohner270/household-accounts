<?php

namespace App\Infrastructures\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use App\Domains\CardAccount\CardAccount;
use App\Domains\CardAccount\CardAccounts;
use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;

class EloquentCardAccount extends Model
{
    protected $table = 'user_cards';

    public function toDomain(): CardAccount
    {
        return new CardAccount(
            new EncryptedCardAccountId($this->card_sign_in_id),
            new EncryptedCardAccountPassword($this->card_sign_in_password)
        );
    }

    public function toDomains(Collection $records): CardAccounts
    {
        return $records->reduce(function ($cardAccounts, $record) {
            $cardAccounts->add($record->toDomain());
            return $cardAccounts;
        }, new CardAccounts);
    }

}
