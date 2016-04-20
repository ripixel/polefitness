<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
			$table->foreign('supervisor_id')->references('id')->on('users');
			$table->foreign('instructor_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations');
        });

        Schema::table('tokens', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });

        Schema::table('user_memberships', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('membership_id')->references('id')->on('memberships');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
