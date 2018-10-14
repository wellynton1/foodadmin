<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccompanyingFeedstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accompanying_feedstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('accompanying_id');
            $table->foreign('accompanying_id')->references('id')->on('accompanyings');
            $table->unsignedInteger('feedstock_id');
            $table->foreign('feedstock_id')->references('id')->on('feedstocks');
            $table->decimal('amount', 15,2);
//            $table->decimal('cost_value', 15,2);
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
        Schema::dropIfExists('accompanying_feedstocks');
    }
}
