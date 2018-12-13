<?php

namespace App\Infrastructures\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use App\Domains\Card\CardId;

use App\Domains\CardAccount\CardAccount;
use App\Domains\CardAccount\CardAccounts;
use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;

class EloquentCardAccount extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'user_cards';

    /**
     * @return CardAccount カードアカウントドメイン
     */
    public function toDomain(): CardAccount
    {
        return new CardAccount(
            new EncryptedCardAccountId(base64_decode($this->card_sign_in_id)),
            new EncryptedCardAccountPassword(base64_decode($this->card_sign_in_password)),
            new CardId($this->card_id)
        );
    }

    /**
     * @param Collection コレクション
     * @return CardAccounts カードアカウントドメイン(複数)
     */
    public function toDomains(Collection $records): CardAccounts
    {
        return $records->reduce(function ($cardAccounts, $record) {
            $cardAccounts->add($record->toDomain());
            return $cardAccounts;
        }, new CardAccounts);
    }

}
