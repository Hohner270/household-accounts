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
    /**
     * @var EloquentCardAccount Eloquentカードアカウントモデル
     */
    private $eloquent;

    /**
     * @param EloquentCardAccount Eloquentカードアカウントモデル
     */
    public function __construct(EloquentCardAccount $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param CardId カードID
     * @param AccountId アカウントID
     * @param EncryptedCardAccountId 暗号化カードID 
     * @param EncryptedCardAccountPassword 暗号化アカウントパスワード
     */
    public function store(CardId $cardId, AccountId $accountId, EncryptedCardAccountId $encryptedCardAccountId, EncryptedCardAccountPassword $encryptedCardAccountPassword): CardAccount
    {
        $this->eloquent->user_id = $accountId->value();
        $this->eloquent->card_id = $cardId->value();
        $this->eloquent->card_sign_in_id = base64_encode($encryptedCardAccountId->value());
        $this->eloquent->card_sign_in_password = base64_encode($encryptedCardAccountPassword->value());
        $this->eloquent->save();

        return $this->eloquent->toDomain();
    }
}