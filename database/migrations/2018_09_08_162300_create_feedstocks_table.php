<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('current_stock')->nullable();
            $table->integer('minimum_stock')->nullable();
            $table->unsignedInteger('id_unit_of_measurement');
            $table->foreign('id_unit_of_measurement')->references('id')->on('unit_of_measurements');
            $table->boolean('active');
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('feedstocks');
    }
}
