<?php

use Ramsey\Uuid\Uuid;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('proprietarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('cpf');
            $table->string('nacionalidade');
            $table->string('email')->nullable();
            $table->string('telefone_fixo')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('profissao')->nullable();

            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('comprovante_endereco')->nullable();

            $table->string('cnh_frente')->nullable();
            $table->string('cnh_verso')->nullable();
            $table->string('certidao_civil')->nullable();
            $table->string('holerite_1')->nullable();
            $table->string('holerite_2')->nullable();
            $table->string('holerite_3')->nullable();

            $table->timestamps();
            $table->softDeletes(); // Adicionando a coluna para Soft Deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietarios');
    }
};
