<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMigrationUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migration__user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('Pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('endereco')->unique();
            $table->dateTime('data_nascimento');
            $table->integer('telefone')->unique();
            $table->string('bi')->unique();
            $table->timestamps();
        });

        Schema::create('Usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('senha');
            $table->unsignedBigInteger('id_Pessoa');
            $table->foreign('id_Pessoa')->references('id')->on('Pessoas');
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
        Schema::dropIfExists('migration__user');
    }
}
