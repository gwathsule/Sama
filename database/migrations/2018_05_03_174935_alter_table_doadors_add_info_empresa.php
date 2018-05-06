<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDoadorsAddInfoEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doadors', function (Blueprint $table) {
            $table->smallInteger('tipo');
            $table->string('contato')->nullable();
            $table->string('logo_arquivo', '500')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doadors', function (Blueprint $table) {
            $table->dropColumn('tipo');
            $table->dropColumn('contato');
            $table->dropColumn('logo_arquivo');
        });
    }
}
