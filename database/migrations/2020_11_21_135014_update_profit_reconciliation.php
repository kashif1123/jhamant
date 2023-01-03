<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProfitReconciliation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profit_reconciliations', function (Blueprint $table) {
            $table->unsignedBigInteger('month_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->double('amount_reconciled')->nullable();
            $table->text('reconcile_description')->nullable();
            $table->text('extra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profit_reconciliations', function (Blueprint $table) {
            //
        });
    }
}
