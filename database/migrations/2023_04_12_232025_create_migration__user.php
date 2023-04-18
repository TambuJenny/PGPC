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
            $table->string('endereco');
            $table->enum('Sexo',['masculino','feminino']);
            $table->dateTime('data_nascimento');
            $table->string('telefone')->unique();
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
        Schema::create('TipoCrime', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nome');
            $table->timestamps();
        });

        Schema::create('Reu', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_Pessoa');
            $table->string('url_imageFoto');
            $table->foreign('id_Pessoa')->references('id')->on('Pessoas');
            $table->timestamps();
        });

        Schema::create('Processo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_Reu');
            $table->foreign('id_Reu')->references('id')->on('Reu');
            $table->unsignedBigInteger('id_TipoCrime');
            $table->foreign('id_TipoCrime')->references('id')->on('TipoCrime');
            $table->dateTime('DataHora');
            $table->string('localincidente');
            $table->string('relatorio');
            $table->string('evidencia');
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
