@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Proprietários Cadastrados</h1>

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
                @foreach ($proprietarios as $proprietario)
                    <tr>
                        <td>{{ $proprietario->nome_completo }}</td>
                        <td>{{ $proprietario->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalDetalhes{{ $proprietario->id }}">
                                Ver Detalhes
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalDetalhes{{ $proprietario->id }}" tabindex="-1"
                                aria-labelledby="modalDetalhesLabel{{ $proprietario->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDetalhesLabel{{ $proprietario->id }}">Detalhes do
                                                Proprietário</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nome Completo:</strong> {{ $proprietario->nome_completo }}</p>
                                            <p><strong>CPF:</strong> {{ $proprietario->cpf }}</p>
                                            <p><strong>Nacionalidade:</strong> {{ $proprietario->nacionalidade }}</p>
                                            <p><strong>E-mail:</strong> {{ $proprietario->email }}</p>
                                            <p><strong>Telefone Fixo:</strong> {{ $proprietario->telefone_fixo }}</p>
                                            <p><strong>Telefone Celular:</strong> {{ $proprietario->telefone_celular }}</p>
                                            <p><strong>Profissão:</strong> {{ $proprietario->profissao }}</p>
                                            <p><strong>Nome do Cônjuge:</strong> {{ $proprietario->nome_conjuge }}</p>
                                            <p><strong>CPF do Cônjuge:</strong> {{ $proprietario->cpf_conjuge }}</p>
                                            <p><strong>RG do Cônjuge:</strong> {{ $proprietario->rg_conjuge }}</p>
                                            <p><strong>Profissão do Cônjuge:</strong> {{ $proprietario->profissao_conjuge }}
                                            </p>
                                            <p><strong>CEP:</strong> {{ $proprietario->cep }}</p>
                                            <p><strong>Logradouro:</strong> {{ $proprietario->logradouro }}</p>
                                            <p><strong>Número:</strong> {{ $proprietario->numero }}</p>
                                            <p><strong>Complemento:</strong> {{ $proprietario->complemento }}</p>
                                            <p><strong>Cidade:</strong> {{ $proprietario->cidade }}</p>
                                            <p><strong>Estado:</strong> {{ $proprietario->estado }}</p>

                                            <!-- Botões para visualizar os anexos -->
                                            <h5 class="mt-4">Anexos:</h5>
                                            <p>
                                                <a href="{{ asset('caminho/para/cnh_frente/' . $proprietario->cnh_frente) }}"
                                                    target="_blank">CNH Frente</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/cnh_verso/' . $proprietario->cnh_verso) }}"
                                                    target="_blank">CNH Verso</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/certidao_civil/' . $proprietario->certidao_civil) }}"
                                                    target="_blank">Certidão Civil</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/holerite_1/' . $proprietario->holerite_1) }}"
                                                    target="_blank">Holerite 1</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/holerite_2/' . $proprietario->holerite_2) }}"
                                                    target="_blank">Holerite 2</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/holerite_3/' . $proprietario->holerite_3) }}"
                                                    target="_blank">Holerite 3</a>
                                            </p>
                                            <p>
                                                <a href="{{ asset('caminho/para/comprovante_endereco/' . $proprietario->comprovante_endereco) }}"
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
