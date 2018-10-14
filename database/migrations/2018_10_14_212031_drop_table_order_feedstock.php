<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableOrderFeedstock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();


        //Schema::dropIfExists('order_feedstocks');


        if (Schema::hasColumn('orders', 'menu_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign('orders_menu_id_foreign');
                $table->dropColumn('menu_id');
            });
        }

        Schema::enableForeignKeyConstraints();

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
