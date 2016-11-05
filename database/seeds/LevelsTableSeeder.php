<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Level::class)->create([
            'level' => 'Threshold',
        ]);

        factory(App\Models\Level::class)->create([
            'level' => 'Typical',
        ]);

        factory(App\Models\Level::class)->create([
            'level' => 'Excellent',
        ]);
    }
}
