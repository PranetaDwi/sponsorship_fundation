<?php

namespace App\Providers;
use Laravel\Passport\Passport;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Passport::tokensCan([
            'entrepreneur' => 'entrepreneur',
            'organizer' => 'organizer',
            'admin' => 'admin',
        ]);

        Passport::setDefaultScope([
            'user',
        ]);

        Passport::tokensExpireIn(now()->addMonths(12));
        Passport::personalAccessTokensExpireIn(now()->addMonths(12));
    }
}
