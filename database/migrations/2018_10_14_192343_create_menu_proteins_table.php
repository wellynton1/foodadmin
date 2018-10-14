<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuProteinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_proteins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->unsignedInteger('protein_id');
            $table->foreign('protein_id')->references('id')->on('proteins');
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
        Schema::dropIfExists('menu_proteins');
    }
}
