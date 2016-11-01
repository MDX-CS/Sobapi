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
        $this->call(UsersTableSeeder::class);
        $this->call(SobsTableSeeder::class);
        $this->call(CapabilitiesTableSeeder::class);

        Artisan::call('passport:install');
    }
}
