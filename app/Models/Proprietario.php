<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proprietario extends Model
{
    use HasFactory, SoftDeletes;

    // Definindo o nome da tabela (opcional se seguir a convenção de nome)
    protected $table = 'proprietarios';

    // Definindo os campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'id',
        'nome_completo',
        'cpf',
        'nacionalidade',
        'email',
        'telefone_fixo',
        'telefone_celular',
        'profissao',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'cidade',
        'estado',
        'cnh_frente',
        'cnh_verso',
        'comprovante_endereco',
    ];

    // Definindo os campos protegidos contra atribuição em massa
    protected $guarded = [];

    // Definindo os campos que devem ser tratados como datas
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // Definindo as mutações de atributos (opcional)
    // Por exemplo, formatar o CPF antes de salvar no banco de dados
    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = preg_replace('/[^0-9]/', '', $value);
    }

    // Definindo relacionamentos (opcional)
    // Por exemplo, se houver relacionamento com a tabela de imóveis:
    // public function imoveis()
    // {
    //     return $this->hasMany(Imovel::class);
    // }
}
