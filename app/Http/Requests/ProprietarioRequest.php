<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProprietarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome_completo' => 'required|max:255',
            'cpf' => 'required|max:14',
            'nacionalidade' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telefone_fixo' => 'max:15',
            'telefone_celular' => 'required|max:15',
            // 'profissao' => 'required|max:255',
            // 'nome_conjuge' => 'max:255',            
            // 'profissao_conjuge' => 'max:255',
            'cep' => 'required|max:10',
            'logradouro' => 'required|max:255',
            'numero' => 'required|max:50',
            'complemento' => 'max:255',
            'cidade' => 'required|max:255',
            'estado' => 'required|max:255',            
            'comprovante_endereco' => 'required|file',
            'rg_frente' => 'file|required',
            'rg_verso' => 'required|file',
            'guia_iptu' => 'required|file',            
            'matricula_imovel' => 'required|file',
            // 'holerite_1' => 'required|max:255',
            // 'holerite_2' => 'required|max:255',
            // 'holerite_3' => 'required|max:255',            
            
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'email' => 'Insira um endereço de e-mail válido.',
            // 'cpf.unique' => 'Este CPF já está em uso por outro locatário.',
            // 'cpf_conjuge.unique' => 'Este CPF do cônjuge já está em uso por outro locatário.',
        ];
    }

    public function attributes()
    {
        return [
            'nome_completo' => 'Nome Completo',
            'cpf' => 'CPF',
            'nacionalidade' => 'Nacionalidade',
            'email' => 'E-mail',
            'telefone_fixo' => 'Telefone Fixo',
            'telefone_celular' => 'Telefone Celular',
            'profissao' => 'Profissão',
            'nome_conjuge' => 'Nome do Cônjuge',
            'cpf_conjuge' => 'CPF do Cônjuge',
            'rg_conjuge' => 'RG do Cônjuge',
            'profissao_conjuge' => 'Profissão do Cônjuge',
            'cep' => 'CEP',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'rg' => 'RG',
            'cpf_cnh' => 'CPF ou CNH',
            'cnh_frente' => 'Frente da CNH',
            'cnh_verso' => 'Verso da CNH',
            'certidao_civil' => 'Certidão Civil',
            'holerite' => 'Holerite',
            'holerite_1' => 'Primeiro Holerite',
            'holerite_2' => 'Segundo Holerite',
            'holerite_3' => 'Terceiro Holerite',            
            'comprovante_endereco' => 'Comprovante de Endereço',
        ];
    }
}
