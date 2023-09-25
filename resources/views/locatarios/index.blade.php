<!-- resources/views/locatarios/index.blade.php -->

@extends('layouts.app')
<!-- Caso esteja usando um layout principal (opcional) -->

@section('content')
    <div class="container">
        <h1>Locatários Cadastrados</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locatarios as $locatario)
                    <tr>
                        <td>{{ $locatario->nome_completo }}</td>
                        <td>{{ $locatario->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalDetalhes{{ $locatario->id }}">
                                Ver Detalhes
                            </button>
                            <!-- Adicione aqui os botões para editar ou excluir o locatário -->
                            {{-- <a href="{{ route('locatarios.edit', $locatario->id) }}" class="btn btn-primary">Editar</a>
                            <!-- Adicione aqui a rota e o método para excluir o locatário (usando o formulário) -->
                            <form action="{{ route('locatarios.destroy', $locatario->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form> --}}
                            <!-- Modal -->
                            <div class="modal fade" id="modalDetalhes{{ $locatario->id }}" tabindex="-1"
                                aria-labelledby="modalDetalhesLabel{{ $locatario->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDetalhesLabel{{ $locatario->id }}">Detalhes do
                                                Locatário</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nome Completo:</strong> {{ $locatario->nome_completo }}</p>
                                            <p><strong>CPF:</strong> {{ $locatario->cpf }}</p>
                                            <p><strong>E-mail:</strong> {{ $locatario->email }}</p>
                                            <p><strong>Telefone Fixo:</strong> {{ $locatario->telefone_fixo }}</p>
                                            <p><strong>Telefone Celular:</strong> {{ $locatario->telefone_celular }}</p>
                                            <p><strong>Profissão:</strong> {{ $locatario->profissao }}</p>

                                            @if ($locatario->estado_civil == 'casado')
                                                <p><strong>Nome do Cônjuge:</strong> {{ $locatario->nome_conjuge }}</p>
                                                <p><strong>CPF do Cônjuge:</strong> {{ $locatario->cpf_conjuge }}</p>
                                                <p><strong>RG do Cônjuge:</strong> {{ $locatario->rg_conjuge }}</p>
                                                <p><strong>Profissão do Cônjuge:</strong> {{ $locatario->profissao_conjuge }}</p>
                                            @endif

                                            <p><strong>CEP:</strong> {{ $locatario->cep }}</p>
                                            <p><strong>Logradouro:</strong> {{ $locatario->logradouro }}</p>
                                            <p><strong>Número:</strong> {{ $locatario->numero }}</p>
                                            <p><strong>Complemento:</strong> {{ $locatario->complemento }}</p>
                                            <p><strong>Cidade:</strong> {{ $locatario->cidade }}</p>
                                            <p><strong>Estado:</strong> {{ $locatario->estado }}</p>

                                            <!-- Botões para visualizar os anexos -->
                                            <h5 class="mt-4">Anexos:</h5>
                                            <p>
                                                <a href="{{ asset('storage/uploads/' . $locatario->cnh_frente) }}"
                                                    target="_blank">CNH Frente</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('storage/uploads/' . $locatario->cnh_verso) }}"
                                                    target="_blank">CNH Verso</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('storage/uploads/' . $locatario->certidao_civil) }}"
                                                    target="_blank">Certidão Civil</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('storage/uploads/' . $locatario->holerite_1) }}"
                                                    target="_blank">Holerite 1</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('storage/uploads/' . $locatario->holerite_2) }}"
                                                    target="_blank">Holerite 2</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('storage/uploads/' . $locatario->holerite_3) }}"
                                                    target="_blank">Holerite 3</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('storage/uploads/' . $locatario->comprovante_endereco) }}"
                                                    target="_blank">Comprovante de Endereço</a>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
