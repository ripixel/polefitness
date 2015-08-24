<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_user', function(Blueprint $table)
        {
            $table->integer('classe_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
			$table->boolean('used_free-space');
			$table->integer('transaction_id')->unsigned()->nullable();
			$table->boolean('rejected');

            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('user_id')->references('id')->on('users');
			$table->foreign('transaction_id')->references('id')->on('transactions');
        });

        Schema::create('classe_payment_method', function(Blueprint $table)
        {
            $table->integer('classe_id')->unsigned()->index();
            $table->integer('payment_method_id')->unsigned()->index();

            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classe_user');
        Schema::drop('classe_payment_method');
    }
}
