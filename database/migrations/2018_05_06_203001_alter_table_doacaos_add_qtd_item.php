<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDoacaosAddQtdItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doacaos', function (Blueprint $table) {
            $table->integer('qtd_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doacaos', function (Blueprint $table) {
            $table->dropColumn('qtd_item');
        });
    }
}
