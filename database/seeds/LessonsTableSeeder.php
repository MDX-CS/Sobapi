<?php

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
        $st = Student::find('pk637');

        factory(Lesson::class, 10)->create()->each(function (Lesson $l) use ($st) {
            if (rand(0, 1) && $st) {
                $l->students()->attach($st->network_name);
            }
        });
    }
}
