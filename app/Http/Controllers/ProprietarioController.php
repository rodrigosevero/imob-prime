<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProprietarioRequest;
use App\Models\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProprietarioController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
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
        if ($request->hasFile('comprovante_endereco')) {
            $proprietario->comprovante_endereco = $this->uploadFile($request->file('comprovante_endereco'));
        }

        if ($request->hasFile('rg_frente')) {
            $proprietario->rg_frente = $this->uploadFile($request->file('rg_frente'));
        }

        if ($request->hasFile('rg_verso')) {
            $proprietario->rg_verso = $this->uploadFile($request->file('rg_verso'));
        }

        if ($request->hasFile('matricula_imovel')) {
            $proprietario->matricula_imovel = $this->uploadFile($request->file('matricula_imovel'));
        }

        if ($request->hasFile('guia_iptu')) {
            $proprietario->guia_iptu = $this->uploadFile($request->file('guia_iptu'));
        }

        if ($request->hasFile('dados_bancarios')) {
            $proprietario->dados_bancarios = $this->uploadFile($request->file('dados_bancarios'));
        }

        if ($request->hasFile('uc_energisa')) {
            $proprietario->uc_energisa = $this->uploadFile($request->file('uc_energisa'));
        }

        if ($request->hasFile('matricula_agua')) {
            $proprietario->matricula_agua = $this->uploadFile($request->file('matricula_agua'));
        }

        // Salvar as alterações no objeto $proprietario
        $proprietario->save();
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

        return redirect()->route('proprietarios.index')->with('success', 'Seu atualizado foi realizado com sucesso! Obrigado.');
    }

    private function uploadFile(UploadedFile $file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        // Defina o local onde deseja salvar os arquivos enviados
        $folder = 'uploads/proprietarios';
        $file->storeAs($folder, $filename, 'public');
        return $filename;
    }


    // Adicionar outros métodos, como show e destroy, se necessário.
}