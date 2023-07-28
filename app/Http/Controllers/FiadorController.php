<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiadorRequest;
use App\Models\Fiador;
use Illuminate\Http\Request;

class FiadorController extends Controller
{
    public function index()
    {

        $fiadores = Fiador::all();
        return view('fiadores.index', compact('fiadores'));
    }

    public function create()
    {
        return view('fiadores.create');
    }

    public function store(FiadorRequest $request)
    {


        // Salvar os dados do formulário no banco de dados
        $locatario = Fiador::create([
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
            Fiador::where('id', $locatario->id)->update(['cnh_frente' => $cnhFrentePath]);
        }

        if ($request->hasFile('cnh_verso')) {
            $cnhVersoPath = $request->file('cnh_verso')->store('documentos');
            Fiador::where('id', $locatario->id)->update(['cnh_verso' => $cnhVersoPath]);
        }

        if ($request->hasFile('certidao_civil')) {
            $certidaoCivilPath = $request->file('certidao_civil')->store('documentos');
            Fiador::where('id', $locatario->id)->update(['certidao_civil' => $certidaoCivilPath]);
        }

        if ($request->hasFile('holerite_1')) {
            $holerite1Path = $request->file('holerite_1')->store('documentos');
            Fiador::where('id', $locatario->id)->update(['holerite_1' => $holerite1Path]);
        }

        if ($request->hasFile('holerite_2')) {
            $holerite2Path = $request->file('holerite_2')->store('documentos');
            Fiador::where('id', $locatario->id)->update(['holerite_2' => $holerite2Path]);
        }

        if ($request->hasFile('holerite_3')) {
            $holerite3Path = $request->file('holerite_3')->store('documentos');
            Fiador::where('id', $locatario->id)->update(['holerite_3' => $holerite3Path]);
        }

        if ($request->hasFile('comprovante_endereco')) {
            $comprovanteEnderecoPath = $request->file('comprovante_endereco')->store('documentos');
            Fiador::where('id', $locatario->id)->update(['comprovante_endereco' => $comprovanteEnderecoPath]);
        }


        // Redirecionar para alguma página após o cadastro (opcional)
        return redirect()->back()->with('success', 'Locatário cadastrado com sucesso!');
    }

    public function edit(Fiador $fiador)
    {
        return view('fiadores.edit', compact('fiador'));
    }

    public function update(FiadorRequest $request, Fiador $fiador)
    {
        $fiador->update($request->validated());

        return redirect()->route('fiadores.index')->with('success', 'Fiador atualizado com sucesso!');
    }
}
