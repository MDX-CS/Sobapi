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
        factory(App\Models\Student::class)->create([
            'email' => 'kouks.koch@gmail.com',
            'name' => 'Pavel Koch',
            'network_name' => 'pk637',
            'password' => bcrypt('secret'),
        ]);

        factory(App\Models\Staff::class)->create([
            'email' => 'kouks@gmail.com',
            'name' => 'Pavel Koch Staff',
            'network_name' => 'pk637',
            'password' => bcrypt('secret'),
        ]);
    }
}
