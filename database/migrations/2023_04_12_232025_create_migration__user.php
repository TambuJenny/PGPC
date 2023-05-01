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
//Terminado
        Schema::create('Pessoa', function (Blueprint $table) {
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
        //Terminado
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('senha');
            $table->unsignedBigInteger('id_Pessoa');
            $table->foreign('id_Pessoa')->references('id')->on('Pessoa');
            $table->timestamps();
        });
        //Terminado
        Schema::create('TipoCrime', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nome');
            $table->timestamps();
        });
        //Terminado
        Schema::create('AutorPeticao', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedBigInteger('id_Pessoa');
            $table->foreign('id_Pessoa')->references('id')->on('Pessoa');
            $table->timestamps();

        });

        Schema::create('Peticao', function (Blueprint $table){
            $table->increments('id');
            $table->String('Descricaocrime');
            $table->unsignedBigInteger('id_autor');
            $table->foreign('id_autor')->references('id')->on('AutorPeticao');
            $table->timestamps();
        });

        Schema::create('Denucia', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedBigInteger('id_TipoCrime');
            $table->foreign('id_TipoCrime')->references('id')->on('TipoCrime');
            $table->unsignedBigInteger('id_Peticao');
            $table->foreign('id_Peticao')->references('id')->on('Peticao');
            $table->timestamps();
        });

        Schema::create('Depoimento', function(Blueprint $table){
            $table->increments('id');
            $table->string('Descricao');
            $table->string('Endereco');
            $table->unsignedBigInteger('id_Pessoa');
            $table->foreign('id_Pessoa')->references('id')->on('Pessoa');
            $table->unsignedBigInteger('id_peticao');
            $table->foreign('id_Peticao')->references('id')->on('Peticao');
            $table->timestamps();

        });
//Terminado
        Schema::create('Reu', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nome')->nullable();
            $table->string('email')->nullable();
            $table->string('endereco')->nullable();
            $table->enum('sexo',['masculino','feminino'])->nullable();
            $table->dateTime('data_nascimento')->nullable();
            $table->string('telefone')->nullable();
            $table->string('bi')->nullable();
            $table->string('url_imageFoto');
            $table->timestamps();
        });
//Terminado
        Schema::create('Processo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_Reu')->nullable();
            $table->foreign('id_Reu')->references('id')->on('Reu');
            $table->unsignedBigInteger('id_TipoCrime');
            $table->foreign('id_TipoCrime')->references('id')->on('TipoCrime');
            $table->dateTime('DataHora');
            $table->string('localincidente');
            $table->string('descricao_Processo');
            $table->string('evidencia');
            $table->timestamps();
        });

        Schema::create('Vitima', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_Pessoa');
            $table->foreign('id_Pessoa')->references('id')->on('Pessoa');
            $table->unsignedBigInteger('id_Processo');
            $table->foreign('id_Processo')->references('id')->on('Processo');
            $table->timestamps();
        });
        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
 }
    public function down() {
        Schema::dropIfExists('migration__user');
    }
}
