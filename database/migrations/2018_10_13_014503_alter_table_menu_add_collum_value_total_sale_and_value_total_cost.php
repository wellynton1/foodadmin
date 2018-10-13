<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMenuAddCollumValueTotalSaleAndValueTotalCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('menus', 'value_total_sale')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->decimal('value_total_sale', 15,2);
            });
        }

        if(!Schema::hasColumn('menus', 'value_total_cost')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->decimal('value_total_cost', 15,2);
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

    }
}
