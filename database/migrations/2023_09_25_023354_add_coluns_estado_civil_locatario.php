<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunsEstadoCivilLocatario extends Migration
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
            $table->string('estado_civil')->nullable();
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
            $table->dropColumn('estado_civil')->nullable();
        });
    }
}
