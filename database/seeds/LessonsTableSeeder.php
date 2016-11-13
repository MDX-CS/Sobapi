<?php

use Carbon\Carbon;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lesson::class, 10)->create()->each(function (Lesson $l) {
            if (rand(0, 1)) {
                $l->attendedBy()->attach(env('LDAP_USERNAME', 'user'), [
                    'week' => rand(1, 24),
                    'loginid' => env('LDAP_USERNAME', 'user'),
                    'record_timestamp' => Carbon::now(),
                ]);
            }

            if (rand(0, 1)) {
                $l->inTimetable()->toggle(env('LDAP_USERNAME', 'user'));
            }
        });
    }
}
