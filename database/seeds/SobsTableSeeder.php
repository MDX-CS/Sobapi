<?php

use Carbon\Carbon;
use App\Models\Sob;
use App\Models\Student;
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
        factory(Sob::class, 20)->create()->each(function (Sob $sob) {
            if (rand(1, 0)) {
                $sob->students()->attach(env('LDAP_USERNAME', 'user'), [
                    'observed_by' => env('LDAP_USERNAME', 'user'),
                    'observed_on' => Carbon::now(),
                ]);
            }

            $sob->level()->associate(rand(1, 3));
            $sob->topic()->associate(rand(1, 4));
            $sob->save();
        });
    }
}
