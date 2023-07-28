@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Fiadores Cadastrados</h1>

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
                @foreach ($fiadores as $fiador)
                    <tr>
                        <td>{{ $fiador->nome_completo }}</td>
                        <td>{{ $fiador->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalDetalhes{{ $fiador->id }}">
                                Ver Detalhes
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalDetalhes{{ $fiador->id }}" tabindex="-1"
                                aria-labelledby="modalDetalhesLabel{{ $fiador->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDetalhesLabel{{ $fiador->id }}">Detalhes do
                                                Fiador</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nome Completo:</strong> {{ $fiador->nome_completo }}</p>
                                            <p><strong>CPF:</strong> {{ $fiador->cpf }}</p>
                                            <p><strong>Nacionalidade:</strong> {{ $fiador->nacionalidade }}</p>
                                            <p><strong>E-mail:</strong> {{ $fiador->email }}</p>
                                            <p><strong>Telefone Fixo:</strong> {{ $fiador->telefone_fixo }}</p>
                                            <p><strong>Telefone Celular:</strong> {{ $fiador->telefone_celular }}</p>
                                            <p><strong>Profissão:</strong> {{ $fiador->profissao }}</p>
                                            <p><strong>CEP:</strong> {{ $fiador->cep }}</p>
                                            <p><strong>Logradouro:</strong> {{ $fiador->logradouro }}</p>
                                            <p><strong>Número:</strong> {{ $fiador->numero }}</p>
                                            <p><strong>Complemento:</strong> {{ $fiador->complemento }}</p>
                                            <p><strong>Cidade:</strong> {{ $fiador->cidade }}</p>
                                            <p><strong>Estado:</strong> {{ $fiador->estado }}</p>

                                            <!-- Botões para visualizar os anexos -->
                                            <h5 class="mt-4">Anexos:</h5>
                                            <p>
                                                <a href="{{ asset('caminho/para/cnh_frente/' . $fiador->cnh_frente) }}"
                                                    target="_blank">CNH Frente</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/cnh_verso/' . $fiador->cnh_verso) }}"
                                                    target="_blank">CNH Verso</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/certidao_civil/' . $fiador->certidao_civil) }}"
                                                    target="_blank">Certidão Civil</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/holerite_1/' . $fiador->holerite_1) }}"
                                                    target="_blank">Holerite 1</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/holerite_2/' . $fiador->holerite_2) }}"
                                                    target="_blank">Holerite 2</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/holerite_3/' . $fiador->holerite_3) }}"
                                                    target="_blank">Holerite 3</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/comprovante_endereco/' . $fiador->comprovante_endereco) }}"
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
