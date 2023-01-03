<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->unsignedInteger('customer_invoices_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->date('expiry')->nullable();
            $table->string('quantity')->nullable();
            $table->double('sale_price')->nullable();
            $table->double('purchase_price')->nullable();
            $table->double('margin_profit')->nullable();
            $table->double('p_discount')->nullable();
            $table->dateTime('sale_date')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
