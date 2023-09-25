<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunsEnderecoGarantiaFiador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fiador', function (Blueprint $table) {
            //
            $table->string('endereco_garantia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fiador', function (Blueprint $table) {
            //
            $table->dropColumn('endereco_garantia');
        });
    }
}
