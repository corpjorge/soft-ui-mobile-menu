<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigInteger('documento')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('social_name')->nullable();
            $table->string('social_id')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->integer('estado');
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
        Schema::dropIfExists('users');
    }
}
