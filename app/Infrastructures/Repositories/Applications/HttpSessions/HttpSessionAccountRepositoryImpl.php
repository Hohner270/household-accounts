<?php

namespace App\Infrastructures\Repositories\Applications\HttpSessions;

use Illuminate\Session\Store;

use App\Domains\Account\Account;
use App\Domains\Account\SessionAccountRepository;

use App\Exceptions\NotFoundException;

class HttpSessionAccountRepositoryImpl implements SessionAccountRepository
{
    const SESSION_KEY = 'account';
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function find(): Account
    {
        $account = $this->session->get(self::SESSION_KEY);
        if (empty($account)) {
            throw new NotFoundException('not signin');
        }
        
        return $account;
    }

    public function store(Account $account)
    {
        $this->session->put(self::SESSION_KEY, $account);
    }
}