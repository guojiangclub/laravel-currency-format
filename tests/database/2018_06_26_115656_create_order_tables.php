<?php

/*
 * This file is part of ibrand/laravel-currency-formatter.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $prefix = config('ibrand.app.database.prefix', 'ibrand_');

        Schema::create($prefix.'order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('items_total');  //商品总金额
            $table->integer('adjustment_total');
            $table->integer('total');  //订单总金额:  items_total+adjustments_total+real_freight
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $prefix = config('ibrand.app.database.prefix', 'ibrand_');

        Schema::dropIfExists($prefix.'order');
    }
}
