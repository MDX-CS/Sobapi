<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Topic::class)->create([
            'topic' => 'Synoptics',
        ]);

        factory(App\Models\Topic::class)->create([
            'topic' => 'Programming',
        ]);

        factory(App\Models\Topic::class)->create([
            'topic' => 'Design',
        ]);

        factory(App\Models\Topic::class)->create([
            'topic' => 'Hardware',
        ]);
    }
}
