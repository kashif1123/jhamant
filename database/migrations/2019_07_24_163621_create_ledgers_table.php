<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('person_type',['customer','supplier','bank','munshi','expense','owner','employee'])->nullable();
            $table->enum('transaction_type',['salary','commission','sale','topup','account opening','sale_return','purchase','purchase_return','paid','received','expense','analyzed_munshiana','munshiana','profit_loss_reconcile','salary','commission'])->nullable();
            $table->unsignedInteger('person_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('main_transaction_id')->nullable();
            $table->unsignedInteger('transaction_account_id')->nullable();
            $table->double('account_last_balance')->nullable();
            $table->string('person_name')->nullable();
            $table->string('cnic')->nullable();
            $table->string('phone_no')->nullable();
            $table->timestamp('date')->nullable();
            $table->text('description')->nullable();
            $table->double('debit')->nullable();
            $table->double('credit')->nullable();
            $table->double('balance')->nullable();
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
        Schema::dropIfExists('ledgers');
    }
}
