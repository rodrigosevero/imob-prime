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
            $table->string('email')->nullable();
            $table->string('telefone_fixo')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('profissao')->nullable();
            $table->string('estado_civil')->nullable();

            $table->string('nome_conjuge')->nullable(); // Novo campo para o nome do cônjuge
            $table->string('cpf_conjuge')->nullable();  // Novo campo para o CPF do cônjuge            
            $table->string('rg_conjuge')->nullable();  // Novo campo para o CPF do cônjuge            
            $table->string('profissao_conjuge')->nullable();

            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();

            $table->string('comprovante_endereco')->nullable();

            $table->string('rg_frente')->nullable();
            $table->string('rg_verso')->nullable();

            $table->string('matricula_imovel')->nullable();
            $table->string('guia_iptu')->nullable();

            $table->string('dados_bancarios')->nullable();
            $table->string('uc_energisa')->nullable();
            $table->string('matricula_agua')->nullable();
            
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
