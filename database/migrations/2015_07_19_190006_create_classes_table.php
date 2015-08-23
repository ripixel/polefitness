<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('location_id')->unsigned()->index();
			$table->string('title');
			$table->text('description');
            $table->datetime('date');
            $table->string('picture_link');
            $table->integer('places_available');
            $table->boolean('members_only');
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classes');
    }
}
