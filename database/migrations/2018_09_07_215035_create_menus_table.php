<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->integer('value_caloric');
            $table->unsignedInteger('id_type_menu');
            $table->foreign('id_type_menu')->references('id')->on('type_menus');
            $table->unsignedInteger('id_status_menu');
            $table->foreign('id_status_menu')->references('id')->on('status_menus');
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
        Schema::dropIfExists('menus');
    }
}
