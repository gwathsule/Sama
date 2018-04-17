<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProdutosAddForeignDemandaMensalId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedInteger('demanda_mensal_id');
            $table->foreign('demanda_mensal_id')
                ->references('id')
                ->on('demanda_mensals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_demanda_mensal_id_foreign');
            $table->dropColumn('demanda_mensal_id');
        });
    }
}
