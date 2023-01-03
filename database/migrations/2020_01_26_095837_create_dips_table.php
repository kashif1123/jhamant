<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dips', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->double('prev_stock')->nullable();
            $table->double('opening_stock')->nullable();
            $table->double('sales')->nullable();
            $table->double('purchases')->nullable();
            $table->double('new_stock')->nullable();
            $table->double('product_testing')->nullable();
            $table->date('last_date')->nullable();
            $table->date('analysed_date')->nullable();
            $table->double('stock_disposed')->nullable();
            $table->double('stock_value')->nullable();
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
        Schema::dropIfExists('dips');
    }
}
