<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domains\CardLog\CardLogRepository;
use App\Domains\CardLog\CardLogFindRepository;
use App\Domains\Account\AccountRepository;
use App\Domains\Card\CardFindRepository;

use App\Infrastructures\Repositories\CardLog\EloquentCardLogRepositoryImpl;
use App\Infrastructures\Repositories\CardLog\EloquentCardLogFindRepositoryImpl;
use App\Infrastructures\Repositories\Account\EloquentAccountRepositoryImpl;
use App\Infrastructures\Repositories\Card\EloquentCardFindRepositoryImpl;

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
        $this->app->bind(CardLogRepository::class, EloquentCardLogRepositoryImpl::class);
        $this->app->bind(CardLogFindRepository::class, EloquentCardLogFindRepositoryImpl::class);
        $this->app->bind(AccountRepository::class, EloquentAccountRepositoryImpl::class);
        $this->app->bind(CardFindRepository::class, EloquentCardFindRepositoryImpl::class);
    }
}
