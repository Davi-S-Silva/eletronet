<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //usuario do sistema - admin, responsavel, usuario comum etc
        //                       1   ,     2     ,    3
        Schema::create('usuarios', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('nome', 255);
            $table->integer('cpf');
            $table->string('login', 255);
            $table->string('email', 255);
            $table->string('celular', 15);
            $table->string('senha', 255);
            $table->integer('nivel')->default(3);
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
        Schema::dropIfExists('usuarios');
    }
}
