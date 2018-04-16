<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->string('nome');
            $table->string('cep', '10')->nullable();
            $table->string('logradouro', '60')->nullable();
            $table->string('numero', 6)->nullable();
            $table->string('bairro', '45')->nullable();
            $table->string('cidade', '45')->nullable();
            $table->char('uf', '2')->nullable();
            $table->string('pais', '20')->nullable();
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
        Schema::drop('enderecos');
    }
}
