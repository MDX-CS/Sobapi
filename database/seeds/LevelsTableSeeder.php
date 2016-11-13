<?php

use App\Models\Level;
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
        factory(Level::class)->create([
            'level' => 'Threshold',
        ]);

        factory(Level::class)->create([
            'level' => 'Typical',
        ]);

        factory(Level::class)->create([
            'level' => 'Excellent',
        ]);
    }
}
