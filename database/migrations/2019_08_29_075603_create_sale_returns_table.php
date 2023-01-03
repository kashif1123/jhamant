<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_returns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('customer_invoices_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('invoice')->nullable();
            $table->string('product')->nullable();
            $table->double('return_qty')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->double('total_paying_amount')->nullable();
            $table->double('paid_amount')->nullable();
            $table->double('amount_due')->nullable();
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
        Schema::dropIfExists('sale_returns');
    }
}
