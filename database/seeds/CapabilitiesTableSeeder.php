<?php

use Illuminate\Database\Seeder;

class CapabilitiesTableSeeder extends Seeder
{
    /**
     * Capabilities array.
     *
     * @var array
     */
    protected $capabilities = [
        'View SOBS',
        'Manage SOBs',
        'Observe SOBs',
        'Manage Staffs',
        'Manage Students',
        'Attendance',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->capabilities as $capability) {
            $c = factory(App\Models\Capability::class)->create(['capability_description' => $capability]);
            $c->users()->attach(env('LDAP_USERNAME', 'user'));
            $c->save();
        }
    }
}
