<?php

use App\Models\Week;
use Illuminate\Database\Seeder;

class WeeksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Week::create(['week_start' => '2016-10-03', 'week_end' => '2016-10-07', 'week_number' => 1]);
        Week::create(['week_start' => '2016-10-10', 'week_end' => '2016-10-14', 'week_number' => 2]);
        Week::create(['week_start' => '2016-10-17', 'week_end' => '2016-10-21', 'week_number' => 3]);
        Week::create(['week_start' => '2016-10-24', 'week_end' => '2016-10-28', 'week_number' => 4]);
        Week::create(['week_start' => '2016-10-31', 'week_end' => '2016-11-04', 'week_number' => 5]);
        Week::create(['week_start' => '2016-11-07', 'week_end' => '2016-11-11', 'week_number' => 6]);
        Week::create(['week_start' => '2016-11-14', 'week_end' => '2016-11-18', 'week_number' => 7]);
        Week::create(['week_start' => '2016-11-21', 'week_end' => '2016-11-25', 'week_number' => 8]);
        Week::create(['week_start' => '2016-11-28', 'week_end' => '2016-12-02', 'week_number' => 9]);
        Week::create(['week_start' => '2016-12-05', 'week_end' => '2016-12-09', 'week_number' => 10]);
        Week::create(['week_start' => '2016-12-12', 'week_end' => '2016-12-16', 'week_number' => 11]);
        Week::create(['week_start' => '2017-01-11', 'week_end' => '2017-01-15', 'week_number' => 12]);
        Week::create(['week_start' => '2017-01-18', 'week_end' => '2017-01-22', 'week_number' => 13]);
        Week::create(['week_start' => '2017-01-25', 'week_end' => '2017-01-29', 'week_number' => 14]);
        Week::create(['week_start' => '2017-02-01', 'week_end' => '2017-02-05', 'week_number' => 15]);
        Week::create(['week_start' => '2017-02-08', 'week_end' => '2017-02-12', 'week_number' => 16]);
        Week::create(['week_start' => '2017-02-15', 'week_end' => '2017-02-19', 'week_number' => 17]);
        Week::create(['week_start' => '2017-02-22', 'week_end' => '2017-02-26', 'week_number' => 18]);
        Week::create(['week_start' => '2017-02-29', 'week_end' => '2017-03-04', 'week_number' => 19]);
        Week::create(['week_start' => '2017-03-07', 'week_end' => '2017-03-11', 'week_number' => 20]);
        Week::create(['week_start' => '2017-03-14', 'week_end' => '2017-03-18', 'week_number' => 21]);
        Week::create(['week_start' => '2017-03-21', 'week_end' => '2017-03-25', 'week_number' => 22]);
        Week::create(['week_start' => '2017-04-11', 'week_end' => '2017-04-15', 'week_number' => 23]);
        Week::create(['week_start' => '2017-04-18', 'week_end' => '2017-04-22', 'week_number' => 24]);
    }
}
