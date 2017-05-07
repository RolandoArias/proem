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
            $table->string('parental_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password', 60)->nullable();
            $table->boolean('activated')->default(false);
            $table->string('picture')->nullable();
            $table->string('token')->nullable();
            $table->integer('linea_negocio')->nullable();
            $table->integer('area_interes')->nullable();
            $table->string('website')->nullable();
            $table->integer('vendedor')->nullable();
            $table->text('comentarios')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('rfc')->nullable();
            $table->string('calle')->nullable();
            $table->string('n_ext')->nullable();
            $table->string('n_int')->nullable();
            $table->string('colonia')->nullable();
            $table->string('cp')->nullable();
            $table->string('municipio')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->string('genero')->nullable();
            $table->string('telephone')->nullable();
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
