<?php

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
        factory(App\Models\Sob::class, 10)->create();
    }
}
