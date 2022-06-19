<?php

namespace App\Providers;

use App\Repository\Interfaces\IAccountRepository;
use App\Repository\Eloquent\AccountRepository;
use App\Repository\Interfaces\IStatementRepository;
use App\Repository\Eloquent\StatementRepository;
use App\Repository\Interfaces\IParticularRepository;
use App\Repository\Eloquent\ParticularRepository;

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
        $this->app->bind(IParticularRepository::class, ParticularRepository::class);
    }
}
