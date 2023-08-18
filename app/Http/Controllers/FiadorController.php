<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiadorRequest;
use App\Models\Fiador;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Mail\Cadastro;
use Illuminate\Support\Facades\Mail;

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
        $fiador = Fiador::create([
            'nome_completo' => $request->input('nome_completo'),
            'cpf' => $request->input('cpf'),            
            'email' => $request->input('email'),
            'telefone_fixo' => $request->input('telefone_fixo'),
            'telefone_celular' => $request->input('telefone_celular'),
            'profissao' => $request->input('profissao'),
            'estado_civil' => $request->input('estado_civil'),
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
        if ($request->hasFile('comprovante_endereco')) {
            $fiador->comprovante_endereco = $this->uploadFile($request->file('comprovante_endereco'));
        }

        if ($request->hasFile('cnh_frente')) {
            $fiador->cnh_frente = $this->uploadFile($request->file('cnh_frente'));
        }

        if ($request->hasFile('cnh_verso')) {
            $fiador->cnh_verso = $this->uploadFile($request->file('cnh_verso'));
        }

        if ($request->hasFile('certidao_civil')) {
            $fiador->certidao_civil = $this->uploadFile($request->file('certidao_civil'));
        }

        if ($request->hasFile('holerite_1')) {
            $fiador->holerite_1 = $this->uploadFile($request->file('holerite_1'));
        }

        if ($request->hasFile('holerite_2')) {
            $fiador->holerite_2 = $this->uploadFile($request->file('holerite_2'));
        }

        if ($request->hasFile('holerite_3')) {
            $fiador->holerite_3 = $this->uploadFile($request->file('holerite_3'));
        }

        if ($request->hasFile('matricula_imovel')) {
            $fiador->matricula_imovel = $this->uploadFile($request->file('matricula_imovel'));
        }

        // Salvar as alterações no objeto $proprietario
        $fiador->save();

        $data = [
            'nome' => $request->input('nome_completo'),            
            'tipo' => 'Fiador',
            'data_pedido' => now()->format('d/m/Y'),
        ];

        Mail::to('cadastro.imobprime@gmail.com')->send(new Cadastro($data));
        Mail::to('rodrigoseverodev@gmail.com')->send(new Cadastro($data));
        


        // Redirecionar para alguma página após o cadastro (opcional)
        return redirect()->back()->with('success', 'Fiador cadastrado com sucesso!');
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

    private function uploadFile(UploadedFile $file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        // Defina o local onde deseja salvar os arquivos enviados
        $folder = 'uploads/locatarios';
        $file->storeAs($folder, $filename, 'public');
        return $filename;
    }
}
