<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunsProfissaoLocatario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locatarios', function (Blueprint $table) {
            //            
            $table->string('nome_empresa')->nullable();
            $table->string('telefone_empresa')->nullable();
            $table->string('endereco_empresa')->nullable();
            $table->float('valor_renda')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locatarios', function (Blueprint $table) {
            //
            $table->dropColumn('nome_empresa');
            $table->dropColumn('telefone_empresa');
            $table->dropColumn('endereco_empresa');
            $table->dropColumn('valor_renda');

        });
    }
}
