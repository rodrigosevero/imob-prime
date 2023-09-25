<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Http\Requests\LocatarioRequest;
use App\Http\Requests\ProprietarioController;
use App\Models\Locatario;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Mail\Cadastro;
use Illuminate\Support\Facades\Mail;

class LocatarioController extends Controller
{
    // ...

    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
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
            'nome_empresa' => $request->input('nome_empresa'),
            'telefone_empresa' => $request->input('telefone_empresa'),
            'endereco_empresa' => $request->input('endereco_empresa'),
            'valor_renda' => $request->input('valor_renda')
        ]);

        // Fazendo o upload dos arquivos e salvando os nomes no banco de dados
        if ($request->hasFile('comprovante_endereco')) {
            $locatario->comprovante_endereco = $this->uploadFile($request->file('comprovante_endereco'));
        }

        if ($request->hasFile('cnh_frente')) {
            $locatario->cnh_frente = $this->uploadFile($request->file('cnh_frente'));
        }

        if ($request->hasFile('cnh_verso')) {
            $locatario->cnh_verso = $this->uploadFile($request->file('cnh_verso'));
        }

        if ($request->hasFile('certidao_civil')) {
            $locatario->certidao_civil = $this->uploadFile($request->file('certidao_civil'));
        }

        if ($request->hasFile('holerite_1')) {
            $locatario->holerite_1 = $this->uploadFile($request->file('holerite_1'));
        }

        if ($request->hasFile('holerite_2')) {
            $locatario->holerite_2 = $this->uploadFile($request->file('holerite_2'));
        }

        if ($request->hasFile('holerite_3')) {
            $locatario->holerite_3 = $this->uploadFile($request->file('holerite_3'));
        }



        // Salvar as alterações no objeto $proprietario
        $locatario->save();

        $data = [
            'nome' => $request->input('nome_completo'),
            'tipo' => 'Locatário',
            'data_pedido' => now()->format('d/m/Y'),
        ];

        // Mail::to('cadastro.imobprime@gmail.com')->send(new Cadastro($data));
        // Mail::to('rodrigoseverodev@gmail.com')->send(new Cadastro($data));


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

    private function uploadFile(UploadedFile $file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        // Defina o local onde deseja salvar os arquivos enviados
        $folder = 'uploads';
        $file->storeAs($folder, $filename, 'public');
        return $filename;
    }
}
