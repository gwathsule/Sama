<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandaMensalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demanda_mensals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entidade_id');
            $table->foreign('entidade_id')
                ->references('id')
                ->on('entidades')
                ->onDelete('cascade');
            $table->string('observacao', 2000)->nullable();
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
        Schema::drop('demanda_mensals');
    }
}
