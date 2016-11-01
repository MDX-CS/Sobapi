<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use App\Auth\Providers\SobapiUserProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Models\Sob::class => \App\Policies\SobPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        auth()->provider('sobapi', function ($app, array $config) {
            return new SobapiUserProvider(
                $app->make('hash'),
                $app->make('ldap'),
                $config['staff'],
                $config['student']
            );
        });
    }
}
