<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('membership_id')->unsigned()->index();
            $table->integer('transaction_id')->unsigned()->index();
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('membership_id')->references('id')->on('memberships');
            //$table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_memberships');
    }
}

