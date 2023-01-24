<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\Group\GroupRepository;
use App\Repository\Group\GroupRepositoryInterface;
use App\Repository\Individual\IndividualRepository;
use App\Repository\Individual\IndividualRepositoryInterface;
use App\Repository\LegalEntity\LegalEntityRepository;
use App\Repository\LegalEntity\LegalEntityRepositoryInterface;
use App\Repository\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RepositoryInterface::class,
            BaseRepository::class
        );
        $this->app->bind(
            LegalEntityRepositoryInterface::class,
            LegalEntityRepository::class
        );
        $this->app->bind(
            IndividualRepositoryInterface::class,
            IndividualRepository::class
        );
        $this->app->bind(
            GroupRepositoryInterface::class,
            GroupRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
