<?php

namespace App\Services\CardAccount;

use App\Domains\CardAccount\CardAccount;
use App\Domains\CardAccount\CardAccountId;
use App\Domains\CardAccount\CardAccountPassword;
use App\Domains\CardAccount\CardAccountRepository;

use App\Domains\Card\CardId;

use App\Domains\Account\Account;
use App\Domains\Account\SessionAccountRepository;

use App\Domains\Card;

class RegisterCardAccount
{
    private $cardAccountRepo;
    private $sessionAccountRepo;

    public function __construct(CardAccountRepository $cardAccountRepo, SessionAccountRepository $sessionAccountRepo)
    {
        $this->cardAccountRepo = $cardAccountRepo;
        $this->sessionAccountRepo = $sessionAccountRepo;
    }

    public function __invoke(CardId $cardId, Account $account, string $cardAccountId, string $cardAccountPassword): CardAccount
    {
        $cardAccountId = new CardAccountId($cardAccountId);
        $cardAccountPassword = new CardAccountPassword($cardAccountPassword);

        $cardAccount = $this->cardAccountRepo->store(
            $cardId,
            $account->id(),
            $cardAccountId->encrypt(),
            $cardAccountPassword->encrypt()
        );

        $account->cardAccounts()->add($cardAccount);
        $this->sessionAccountRepo->store($account);

        return $cardAccount;
    }
}