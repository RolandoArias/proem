<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password', 60)->nullable();
            $table->rememberToken();
            $table->boolean('activated')->default(false);
            $table->string('picture')->nullable();
            $table->string('token')->nullable();
            $table->string('gender')->nullable();
            $table->string('telephone')->nullable();
            $table->integer('points')->nullable();
            $table->string('estado')->nullable();
            $table->string('municipio')->nullable();
            $table->integer('login')->nullable();
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
