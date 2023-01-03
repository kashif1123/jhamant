<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('munshi_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->enum('supplier_person',['supplier','customer'])->nullable();
            $table->string('invoice')->nullable();
            $table->double('total')->nullable();
            $table->double('paid')->nullable();
            $table->double('due')->nullable();
            $table->double('wages')->nullable();
            $table->double('other_expenses')->nullable();
            $table->double('munshiana')->nullable();
            $table->double('withholding_tax')->nullable();
            $table->double('discount')->nullable();
            $table->double('grand_total')->nullable();
            $table->dateTime('date_of_purchase')->nullable();
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
        Schema::dropIfExists('supplier_invoices');
    }
}
