<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sobs', function (Blueprint $table) {
            $table->increments('sob_id');
            $table->integer('level_id');
            $table->integer('topic_id');
            $table->string('sob');
            $table->string('url');
            $table->timestamp('expected_start_date');
            $table->timestamp('expected_completion_date');
            $table->text('sob_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sobs');
    }
}
