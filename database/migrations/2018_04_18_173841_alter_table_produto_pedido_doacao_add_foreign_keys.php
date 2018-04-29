<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProdutoPedidoDoacaoAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedInteger('demanda_mensal_id')->nullable();
            $table->unsignedInteger('pedido_id')->nullable();
            $table->unsignedInteger('doacao_id')->nullable();

            $table->foreign('pedido_id')
                ->references('id')
                ->on('pedidos')
                ->onDelete('cascade');

            $table->foreign('demanda_mensal_id')
                ->references('id')
                ->on('demanda_mensals')
                ->onDelete('cascade');

            $table->foreign('doacao_id')
                ->references('id')
                ->on('doacaos')
                ->onDelete('cascade');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->unsignedInteger('entidade_id');

            $table->foreign('entidade_id')
                ->references('id')
                ->on('entidades')
                ->onDelete('cascade');
        });

        Schema::table('doacaos', function (Blueprint $table) {
            $table->unsignedInteger('doador_id');
            $table->unsignedInteger('entidade_id')->nullable();
            $table->unsignedInteger('pedido_id')->nullable();

           $table->foreign('doador_id')
                ->references('id')
                ->on('doadors')
                ->onDelete('cascade');

            $table->foreign('entidade_id')
                ->references('id')
                ->on('entidades')
                ->onDelete('cascade');

            $table->foreign('pedido_id')
                ->references('id')
                ->on('pedidos')
                ->onDelete('cascade');

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
            $table->dropForeign('produtos_pedido_id_foreign');
            $table->dropColumn('pedido_id');

            $table->dropForeign('produtos_demanda_mensal_id_foreign');
            $table->dropColumn('demanda_mensal_id');

            $table->dropForeign('produtos_doacao_id_foreign');
            $table->dropColumn('doacao_id');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_entidade_id_foreign');
            $table->dropColumn('entidade_id');
        });

        Schema::table('doacaos', function (Blueprint $table) {
            $table->dropForeign('doacaos_doador_id_foreign');
            $table->dropColumn('doador_id');

            $table->dropForeign('doacaos_entidade_id_foreign');
            $table->dropColumn('entidade_id');

            $table->dropForeign('doacaos_pedido_id_foreign');
            $table->dropColumn('pedido_id');
        });
    }
}
