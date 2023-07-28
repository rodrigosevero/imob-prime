<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProprietarioRequest;
use App\Models\Proprietario;
use Illuminate\Http\Request;

class ProprietarioController extends Controller
{

    public function index()
    {
        $proprietarios = Proprietario::all();
        return view('proprietarios.index', compact('proprietarios'));
    }

    public function create()
    {
        return view('proprietarios.create');
    }

    public function store(ProprietarioRequest $request)
    {
        // Salvar os dados do formulário no banco de dados
        $proprietario = Proprietario::create([
            'nome_completo' => $request->input('nome_completo'),
            'cpf' => $request->input('cpf'),
            'nacionalidade' => $request->input('nacionalidade'),
            'email' => $request->input('email'),
            'telefone_fixo' => $request->input('telefone_fixo'),
            'telefone_celular' => $request->input('telefone_celular'),
            'profissao' => $request->input('profissao'),
            'cep' => $request->input('cep'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
        ]);

        // Fazendo o upload dos arquivos e salvando os nomes no banco de dados
        // Coloque aqui a lógica para fazer o upload dos arquivos do proprietário, se aplicável.

        // Redirecionar para alguma página após o cadastro (opcional)
        return redirect()->back()->with('success', 'Proprietário cadastrado com sucesso!');
    }

    public function edit(Proprietario $proprietario)
    {
        return view('proprietarios.edit', compact('proprietario'));
    }

    public function update(ProprietarioRequest $request, Proprietario $proprietario)
    {
        $data = $request->all();

        // Atualizar os dados do formulário no banco de dados
        $proprietario->update($data);

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário atualizado com sucesso!');
    }

   

    // Adicionar outros métodos, como show e destroy, se necessário.
}
