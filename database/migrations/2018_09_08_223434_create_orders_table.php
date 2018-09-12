<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_menu');
            $table->foreign('id_menu')->references('id')->on('menus');
            $table->unsignedInteger('id_customer');
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->unsignedInteger('id_customer_address');
            $table->foreign('id_customer_address')->references('id')->on('customer_addresses');
            $table->unsignedInteger('id_status_order');
            $table->foreign('id_status_order')->references('id')->on('status_orders');
            $table->time('delivery_schedule');
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
        Schema::dropIfExists('orders');
    }
}
