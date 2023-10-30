<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakings', function (Blueprint $table) {
        $table->bigIncrements('id');
            $table->bigInteger('breakings_id')->unsigned();
            $table->foreign('breakings_id')->references('id')->on('workings');# 外部キー制約をつける
            $table->dateTime('breakings_start_time');
            $table->dateTime('breakings_end_time')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breakings');
    }
}
