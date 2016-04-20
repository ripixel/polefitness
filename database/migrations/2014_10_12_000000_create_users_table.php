<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->boolean('admin')->default(0);
			$table->boolean('member')->default(0);
			$table->boolean('instructor')->default(0);
            $table->string('first_name');
            $table->string('last_name');
			$table->string('picture_link');
            $table->string('email')->unique();
            $table->boolean('email_confirmed');
            $table->string('password', 60);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
