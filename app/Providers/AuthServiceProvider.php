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
        \App\Models\Week::class => \App\Policies\WeekPolicy::class,
        \App\Models\Level::class => \App\Policies\LevelPolicy::class,
        \App\Models\Staff::class => \App\Policies\StaffPolicy::class,
        \App\Models\Topic::class => \App\Policies\TopicPolicy::class,
        \App\Models\Lesson::class => \App\Policies\LessonPolicy::class,
        \App\Models\Student::class => \App\Policies\StudentPolicy::class,
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
