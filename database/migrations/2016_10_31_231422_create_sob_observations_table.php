<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSobObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sob_observations', function (Blueprint $table) {
            $table->increments('observation_id');
            $table->integer('sob_id')->index();
            $table->integer('student_id')->index();
            $table->timestamp('observed_on')->nullable();
            $table->integer('observation_notes')->nullable();
            $table->integer('observed_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sob_observations');
    }
}
