<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domains\Card\CardFindRepository;

use App\Domains\CardLog\CardLogRepository;
use App\Domains\CardLog\CardLogFindRepository;
use App\Domains\CardLog\SessionCardLogRepository;

use App\Domains\Account\AccountRepository;
use App\Domains\Account\AccountFindRepository;
use App\Domains\Account\SessionAccountRepository;

use App\Domains\CardAccount\CardAccountRepository;
use App\Domains\CardAccount\CardAccountFindRepository;

use App\Infrastructures\Repositories\Domains\Card\EloquentCardFindRepositoryImpl;

use App\Infrastructures\Repositories\Domains\CardLog\EloquentCardLogRepositoryImpl;
use App\Infrastructures\Repositories\Domains\CardLog\EloquentCardLogFindRepositoryImpl;
use App\Infrastructures\Repositories\Applications\Redis\RedisCardLogRepositoryImpl;

use App\Infrastructures\Repositories\Domains\Account\EloquentAccountRepositoryImpl;
use App\Infrastructures\Repositories\Domains\Account\EloquentAccountFindRepositoryImpl;

use App\Infrastructures\Repositories\Domains\CardAccount\EloquentCardAccountRepositoryImpl;
use App\Infrastructures\Repositories\Domains\CardAccount\EloquentCardAccountFindRepositoryImpl;

use App\Infrastructures\Repositories\Applications\HttpSessions\HttpSessionAccountRepositoryImpl;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CardFindRepository::class, EloquentCardFindRepositoryImpl::class);
        
        $this->app->bind(CardLogRepository::class, EloquentCardLogRepositoryImpl::class);
        $this->app->bind(CardLogFindRepository::class, EloquentCardLogFindRepositoryImpl::class);
        $this->app->bind(SessionCardLogRepository::class, RedisCardLogRepositoryImpl::class);

        $this->app->bind(AccountRepository::class, EloquentAccountRepositoryImpl::class);
        $this->app->bind(AccountFindRepository::class, EloquentAccountFindRepositoryImpl::class);
        $this->app->bind(SessionAccountRepository::class, HttpSessionAccountRepositoryImpl::class);

        $this->app->bind(CardAccountRepository::class, EloquentCardAccountRepositoryImpl::class);
        $this->app->bind(CardAccountFindRepository::class, EloquentCardAccountFindRepositoryImpl::class);
        

    }
}
