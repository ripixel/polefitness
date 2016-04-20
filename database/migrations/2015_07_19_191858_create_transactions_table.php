<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('payment_method_id')->unsigned()->index();
            $table->string('name');
            $table->string('description');
			$table->boolean('grant_membership')->default(0);
            $table->double('amount');
            $table->boolean('successful');
            $table->boolean('failed');
            $table->boolean('strike');
			$table->boolean('resolved');
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
