<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediadors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('cpf', 11)->unique()->nullable();
            $table->string('cnpj', 11)->unique()->nullable();
            $table->string('celular', 11);
            $table->string('telefone', 10);
            $table->string('nome_grupo');
            $table->string('nome_responsavel');
            $table->integer('quantidade_membros');
            $table->string('email')->unique();
            $table->integer('situacao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mediadors');
    }
}
