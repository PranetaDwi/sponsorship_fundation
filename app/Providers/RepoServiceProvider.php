<?php

namespace App\Providers;

use App\Models\Umkm;

use Illuminate\Support\ServiceProvider;

use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryImpl;
use App\Repository\UserData\UserDataRepository;
use App\Repository\UserData\UserDataRepositoryImpl;
use App\Repository\Umkm\UmkmRepository;
use App\Repository\Umkm\UmkmRepositoryImpl;
use App\Repository\Organization\OrganizationRepository;
use App\Repository\Organization\OrganizationRepositoryImpl;

use App\Service\Auth\AuthService;
use App\Service\Auth\AuthServiceImpl;
use App\Service\Umkm\UmkmService;
use App\Service\Umkm\UmkmServiceImpl;
use App\Service\Organization\OrganizationService;
use App\Service\Organization\OrganizationServiceImpl;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(UserDataRepository::class, UserDataRepositoryImpl::class);
        $this->app->bind(UmkmRepository::class, UmkmRepositoryImpl::class);
        $this->app->bind(OrganizationRepository::class, OrganizationRepositoryImpl::class);

        $this->app->bind(AuthService::class, AuthServiceImpl::class);
        $this->app->bind(UmkmService::class, UmkmServiceImpl::class);
        $this->app->bind(OrganizationService::class, OrganizationServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
