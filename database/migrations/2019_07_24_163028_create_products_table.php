<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->string('name')->nullable();
            $table->string('barcode')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->double('purchase_price')->nullable();
            $table->double('sale_price')->nullable();
            $table->string('total_qty')->nullable();
            $table->enum('unit',['qty','kg'])->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
