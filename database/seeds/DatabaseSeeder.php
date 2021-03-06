<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WeeksTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SobsTableSeeder::class);
        $this->call(CapabilitiesTableSeeder::class);
        $this->call(LessonsTableSeeder::class);

        Artisan::call('passport:install');
    }
}
