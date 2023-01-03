<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('person_type',['customer','supplier','owner','employee'])->nullable();
            $table->unsignedInteger('person_id')->nullable();
            $table->unsignedInteger('account_id')->nullable();
            $table->double('last_balance')->nullable();
            $table->double('current_balance')->nullable();
            $table->double('receiving_amount')->nullable();
            $table->timestamp('date')->nullable();
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
        Schema::dropIfExists('receive_amounts');
    }
}
