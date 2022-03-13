<?php

namespace App\Providers;

use App\Repository\Interfaces\IAccountRepository;
use App\Repository\Eloquent\AccountRepository;
use App\Repository\Interfaces\IStatementRepository;
use App\Repository\Eloquent\StatementRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAccountRepository::class, AccountRepository::class);
        $this->app->bind(IStatementRepository::class, StatementRepository::class);
    }
}
