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
        Schema::create('class_user', function(Blueprint $table)
        {
            $table->integer('class_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('class_membership', function(Blueprint $table)
        {
            $table->integer('class_id')->unsigned()->index();
            $table->integer('membership_id')->unsigned()->index();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('membership_id')->references('id')->on('memberships');
        });

        Schema::create('class_payment_method', function(Blueprint $table)
        {
            $table->integer('class_id')->unsigned()->index();
            $table->integer('payment_method_id')->unsigned()->index();

            $table->foreign('class_id')->references('id')->on('classes');
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
        Schema::drop('class_user');
        Schema::drop('class_membership');
        Schema::drop('class_payment_method');
    }
}
