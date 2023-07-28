<?php

namespace App\Http\Controllers;
Use Laracasts\Flash\Flash;
use App\Http\Requests\LocatarioRequest;
use App\Http\Requests\ProprietarioController;
use App\Models\Locatario;
use Illuminate\Http\Request;

class LocatarioController extends Controller
{
    // ...

    public function index()
    {
        $locatarios = Locatario::all();
        return view('locatarios.index', compact('locatarios'));
    }

    public function create()
    {
        return view('locatarios.create');
    }

    public function store(LocatarioRequest $request)
    {
        

        // Salvar os dados do formulário no banco de dados
        $locatario = Locatario::create([
            'nome_completo' => $request->input('nome_completo'),
            'cpf' => $request->input('cpf'),
            'nacionalidade' => $request->input('nacionalidade'),
            'email' => $request->input('email'),
            'telefone_fixo' => $request->input('telefone_fixo'),
            'telefone_celular' => $request->input('telefone_celular'),
            'profissao' => $request->input('profissao'),
            'nome_conjuge' => $request->input('nome_conjuge'),
            'cpf_conjuge' => $request->input('cpf_conjuge'),
            'rg_conjuge' => $request->input('rg_conjuge'),
            'profissao_conjuge' => $request->input('profissao_conjuge'),
            'cep' => $request->input('cep'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
        ]);
        
        // Fazendo o upload dos arquivos e salvando os nomes no banco de dados
        if ($request->hasFile('cnh_frente')) {
            $cnhFrentePath = $request->file('cnh_frente')->store('documentos');            
            Locatario::where('id', $locatario->id)->update(['cnh_frente' => $cnhFrentePath]);
        }

        if ($request->hasFile('cnh_verso')) {
            $cnhVersoPath = $request->file('cnh_verso')->store('documentos');            
            Locatario::where('id', $locatario->id)->update(['cnh_verso' => $cnhVersoPath]);
        }

        if ($request->hasFile('certidao_civil')) {
            $certidaoCivilPath = $request->file('certidao_civil')->store('documentos');            
            Locatario::where('id', $locatario->id)->update(['certidao_civil' => $certidaoCivilPath]);
        }

        if ($request->hasFile('holerite_1')) {
            $holerite1Path = $request->file('holerite_1')->store('documentos');
            Locatario::where('id', $locatario->id)->update(['holerite_1' => $holerite1Path]);
        }

        if ($request->hasFile('holerite_2')) {
            $holerite2Path = $request->file('holerite_2')->store('documentos');            
            Locatario::where('id', $locatario->id)->update(['holerite_2' => $holerite2Path]);
        }

        if ($request->hasFile('holerite_3')) {
            $holerite3Path = $request->file('holerite_3')->store('documentos');            
            Locatario::where('id', $locatario->id)->update(['holerite_3' => $holerite3Path]);
        }

        if ($request->hasFile('comprovante_endereco')) {            
            $comprovanteEnderecoPath = $request->file('comprovante_endereco')->store('documentos');            
            Locatario::where('id', $locatario->id)->update(['comprovante_endereco' => $comprovanteEnderecoPath]);        
        }

        
        // Redirecionar para alguma página após o cadastro (opcional)
        return redirect()->back()->with('success', 'Locatário cadastrado com sucesso!');
    }

    public function edit(Locatario $locatario)
    {
        return view('locatarios.edit', compact('locatario'));
    }

    public function update(LocatarioRequest $request, Locatario $locatario)
    {
        $data = $request->all();

        // Verificar se os campos do cônjuge foram preenchidos e adicionar na requisição
        if (isset($data['nome_conjuge']) && isset($data['cpf_conjuge']) && isset($data['nacionalidade_conjuge'])) {
            $locatario->nome_conjuge = $data['nome_conjuge'];
            $locatario->cpf_conjuge = $data['cpf_conjuge'];
            $locatario->nacionalidade_conjuge = $data['nacionalidade_conjuge'];
            $locatario->save();
        } else {
            $locatario->update($data);
        }

        return redirect()->route('locatarios.index')->with('success', 'Locatário cadastrado com sucesso!');

    }
}
