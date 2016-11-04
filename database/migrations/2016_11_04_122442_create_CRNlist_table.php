<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCRNlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CRNlist', function (Blueprint $table) {
            $table->increments('crn_id');
            $table->integer('crn');
            $table->integer('oldcrn');
            $table->text('codetype');
            $table->string('day');
            $table->string('room');
            $table->integer('starttime');
            $table->integer('endtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CRNlist');
    }
}
