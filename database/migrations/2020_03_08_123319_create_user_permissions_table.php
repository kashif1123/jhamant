<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('access_type',['standard','extended'])->nullable();
            $table->enum('sale',['true','false'])->nullable();
            $table->enum('sale_report',['true','false'])->nullable();
            $table->enum('sale_return',['true','false'])->nullable();
            $table->enum('sale_return_report',['true','false'])->nullable();
            $table->enum('purchase',['true','false'])->nullable();
            $table->enum('purchase_report',['true','false'])->nullable();
            $table->enum('purchase_return',['true','false'])->nullable();
            $table->enum('purchase_return_report',['true','false'])->nullable();
            $table->enum('new_customer',['true','false'])->nullable();
            $table->enum('new_user',['true','false'])->nullable();
            $table->enum('all_customer',['true','false'])->nullable();
            $table->enum('all_supplier',['true','false'])->nullable();
            $table->enum('all_user',['true','false'])->nullable();
            $table->enum('supplier_invoices',['true','false'])->nullable();
            $table->enum('customer_invoices',['true','false'])->nullable();
            $table->enum('new_bank',['true','false'])->nullable();
            $table->enum('all_bank',['true','false'])->nullable();
            $table->enum('account_topup',['true','false'])->nullable();
            $table->enum('account_topup_report',['true','false'])->nullable();
            $table->enum('pay',['true','false'])->nullable();
            $table->enum('all_paid',['true','false'])->nullable();
            $table->enum('receive',['true','false'])->nullable();
            $table->enum('all_received',['true','false'])->nullable();
            $table->enum('new_expenses',['true','false'])->nullable();
            $table->enum('all_expenses',['true','false'])->nullable();
            $table->enum('ledger',['true','false'])->nullable();
            $table->enum('day_close',['true','false'])->nullable();
            $table->enum('month_close',['true','false'])->nullable();

            $table->enum('standard_dashboard',['true','false'])->nullable();
            $table->enum('standard_sale',['true','false'])->nullable();
            $table->enum('standard_product',['true','false'])->nullable();
            $table->enum('standard_account',['true','false'])->nullable();
            $table->enum('standard_pay_receive',['true','false'])->nullable();
            $table->enum('standard_purchase_sale',['true','false'])->nullable();
            $table->enum('standard_expenses',['true','false'])->nullable();
            $table->enum('standard_ledger',['true','false'])->nullable();
            $table->enum('standard_day_close',['true','false'])->nullable();
            $table->enum('standard_month_close',['true','false'])->nullable();
            $table->enum('standard_reports',['true','false'])->nullable();

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
        Schema::dropIfExists('user_permissions');
    }
}
