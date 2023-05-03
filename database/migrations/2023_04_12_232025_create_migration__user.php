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
            $table->string('Classificacao');
            $table->timestamps();
        });
        //Terminado

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
            $table->timestamps();
        });
        
        //Autor da petição, quem cria a petição.
        Schema::create('AutorPeticao', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_Pessoa');
            $table->foreign('id_Pessoa')->references('id')->on('pessoa');
            $table->timestamps();
        });

        Schema::create('Peticao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricaoCrime');
            $table->unsignedBigInteger('id_autorPeticao');
            $table->foreign('id_autorPeticao')->references('id')->on('Autorpeticao');
            $table->timestamps();
        });

        Schema::create('Vitima', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_pessoa');
            $table->unsignedBigInteger('id_peticao');
            
            $table->foreign('id_peticao')->references('id')->on('peticao');
            $table->foreign('id_Pessoa')->references('id')->on('pessoa');
            $table->timestamps();
        });

        Schema::create('DenunciaQueixaCrime', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricaoCrime');
            $table->string('localCrime');
            $table->dateTime('dataHora');

            $table->unsignedBigInteger('id_reu');
            $table->unsignedBigInteger('id_TipoCrime');
            $table->unsignedBigInteger('id_peticao');
            
            $table->foreign('id_reu')->references('id')->on('Reu');
            $table->foreign('id_TipoCrime')->references('id')->on('TipoCrime');
            $table->foreign('id_peticao')->references('id')->on('Peticao');
            $table->timestamps();
        });

        Schema::create('Prova', function (Blueprint $table) {
            $table->increments('id');
            $table->string('urlFile')->nullable(true);
            $table->string('descricao')->nullable(true);

            $table->unsignedBigInteger('id_reu')->nullable(true);
            $table->unsignedBigInteger('id_vitima')->nullable(true);
            $table->unsignedBigInteger('id_autorPeticao')->nullable(true);
            $table->unsignedBigInteger('id_DenunciaQueixaCrime');

            $table->foreign('id_reu')->references('id')->on('Reu');
            $table->foreign('id_vitima')->references('id')->on('Vitima');
            $table->foreign('id_autorPeticao')->references('id')->on('AutorPeticao');
            $table->foreign('id_DenunciaQueixaCrime')->references('id')->on('DenunciaQueixaCrime');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
 
    public function down() {
        Schema::dropIfExists('migration__user');
    }

}