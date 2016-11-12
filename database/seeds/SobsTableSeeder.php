<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Sob::class, 5)->create()->each(function (App\Models\Sob $sob) {
            $sob->students()->attach(env('LDAP_USERNAME', 'user'), [
                'observed_by' => env('LDAP_USERNAME', 'user'),
                'observed_on' => Carbon::now(),
            ]);
            $sob->level()->associate(rand(1, 3));
            $sob->topic()->associate(rand(1, 4));
            $sob->save();
        });

        factory(App\Models\Sob::class, 5)->create();
    }
}
