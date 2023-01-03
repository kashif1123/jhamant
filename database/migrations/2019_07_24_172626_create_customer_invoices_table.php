<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('customer_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->enum('customer_person',['supplier','customer'])->nullable();
            $table->string('invoice')->nullable();
            $table->double('total')->nullable();
            $table->timestamp('date')->nullable();
            $table->double('paid')->nullable();
            $table->double('due')->nullable();
            $table->double('discount')->nullable();
            $table->double('grand_total')->nullable();
            $table->double('commission')->nullable();
            $table->string('extra')->nullable();
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
        Schema::dropIfExists('customer_invoices');
    }
}
