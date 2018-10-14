<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProteinFeedstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protein_feedstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('protein_id');
            $table->foreign('protein_id')->references('id')->on('proteins');
            $table->unsignedInteger('feedstock_id');
            $table->foreign('feedstock_id')->references('id')->on('feedstocks');
            $table->decimal('amount', 15, 2);
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
        Schema::dropIfExists('protein_feedstocks');
    }
}
