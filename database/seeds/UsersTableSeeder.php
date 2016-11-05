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
        // factory(App\Models\Student::class)->create([
        //     'email' => 'kouks.koch@gmail.com',
        //     'firstname' => 'Pavel',
        //     'lastname' => 'Koch',
        //     'network_name' => env('LDAP_USERNAME', 'user'),
        //     'password' => bcrypt(env('LDAP_PASSWORD', 'secret')),
        // ]);

        factory(App\Models\Staff::class)->create([
            'email' => 'kouks@gmail.com',
            'firstname' => 'Super',
            'lastname' => 'User',
            'network_name' => env('LDAP_USERNAME', 'user'),
            'password' => bcrypt(env('LDAP_PASSWORD', 'secret')),
        ]);

        factory(App\Models\Staff::class, 5)->create();
        factory(App\Models\Student::class, 5)->create();
    }
}
