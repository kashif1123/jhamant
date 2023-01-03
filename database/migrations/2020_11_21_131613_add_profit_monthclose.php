<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfitMonthclose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('month_closes', function (Blueprint $table) {
            $table->double('total_profit')->nullable();
            $table->double('total_reconciled')->nullable();
            $table->enum('reconciled',['yes','no'])->nullable();
            $table->enum('profit_loss',['profit','loss'])->nullable();
            $table->string('extra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('month_closes', function (Blueprint $table) {
            //
        });
    }
}
