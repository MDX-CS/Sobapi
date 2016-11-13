<?php

use App\Models\Topic;
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
        factory(Topic::class)->create([
            'topic' => 'Synoptics',
        ]);

        factory(Topic::class)->create([
            'topic' => 'Programming',
        ]);

        factory(Topic::class)->create([
            'topic' => 'Design',
        ]);

        factory(Topic::class)->create([
            'topic' => 'Hardware',
        ]);
    }
}
