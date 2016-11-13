<?php

use App\Models\Staff;
use App\Models\Student;
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
        // factory(Student::class)->create([
        //     'email' => 'kouks.koch@gmail.com',
        //     'firstname' => 'Pavel',
        //     'lastname' => 'Koch',
        //     'network_name' => env('LDAP_USERNAME', 'user'),
        //     'password' => bcrypt(env('LDAP_PASSWORD', 'secret')),
        // ]);

        factory(Staff::class)->create([
            'email' => 'kouks@gmail.com',
            'firstname' => 'Super',
            'lastname' => 'User',
            'network_name' => env('LDAP_USERNAME', 'user'),
            'password' => bcrypt(env('LDAP_PASSWORD', 'secret')),
        ]);

        factory(Staff::class, 5)->create();
        factory(Student::class, 5)->create();
    }
}
