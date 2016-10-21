<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'email' => 'kouks.koch@gmail.com',
            'name' => 'Pavel Koch',
            'password' => bcrypt('secret'),
        ]);

        factory(App\User::class, 5)->create();
    }
}
