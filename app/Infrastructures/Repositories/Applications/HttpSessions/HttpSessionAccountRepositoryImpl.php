<?php

namespace App\Infrastructures\Repositories\Applications\HttpSessions;

use Illuminate\Session\Store;

use App\Domains\Account\Account;
use App\Domains\Account\SessionAccountRepository;

use App\Exceptions\NotFoundException;

class HttpSessionAccountRepositoryImpl implements SessionAccountRepository
{
    /**
     * @var string セッションキー
     */
    const SESSION_KEY = 'account';

    /**
     * @var Store SessionClient
     */
    private $session;

    /**
     * @param Store SessionClient
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * @return Account アカウントドメイン
     */
    public function find(): Account
    {
        $account = $this->session->get(self::SESSION_KEY);
        $this->session->regenerate();
        
        if (empty($account)) {
            throw new NotFoundException('not signin');
        }
        
        return $account;
    }

    /**
     * @return void
     */
    public function store(Account $account): void
    {
        $this->session->put(self::SESSION_KEY, $account);
    }
}