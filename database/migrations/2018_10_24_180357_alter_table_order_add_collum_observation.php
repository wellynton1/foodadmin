<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableOrderAddCollumObservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('orders', 'observation')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->longText('observation')->nullable();
            });
        }

        if(!Schema::hasColumn('orders', 'date_delivery')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->date('date_delivery')->nullable();
            });
        }

        if(!Schema::hasColumn('orders', 'descount')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->double('descount', 15, 2)->nullable();
            });
        }

        if(!Schema::hasColumn('orders', 'value_order')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->double('value_order', 15, 2)->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
