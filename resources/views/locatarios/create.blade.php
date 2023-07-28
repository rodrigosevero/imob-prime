<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro - Imobiliária Prime</title>
    <!-- CSS do Bootstrap 5.3.0 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo Imobiliária Prime" width="250">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulário de Cadastro de Locatário</div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('locatarios.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control @error('nome_completo') is-invalid @enderror"
                                    id="nome_completo" name="nome_completo" value="{{ old('nome_completo') }}">
                                @error('nome_completo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cpf" class="form-label">CPF</label>
                                        <input type="text" class="form-control @error('cpf') is-invalid @enderror"
                                            id="cpf" name="cpf" value="{{ old('cpf') }}">
                                        @error('cpf')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nacionalidade" class="form-label">Nacionalidade</label>
                                        <input type="text"
                                            class="form-control @error('nacionalidade') is-invalid @enderror"
                                            id="nacionalidade" name="nacionalidade" value="{{ old('nacionalidade') }}">
                                        @error('nacionalidade')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telefone_fixo" class="form-label">Telefone Fixo</label>
                                        <input type="text"
                                            class="form-control @error('telefone_fixo') is-invalid @enderror"
                                            id="telefone_fixo" name="telefone_fixo" value="{{ old('telefone_fixo') }}">
                                        @error('telefone_fixo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telefone_celular" class="form-label">Telefone Celular</label>
                                        <input type="text"
                                            class="form-control @error('telefone_celular') is-invalid @enderror"
                                            id="telefone_celular" name="telefone_celular"
                                            value="{{ old('telefone_celular') }}">
                                        @error('telefone_celular')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="profissao_conjuge" class="form-label">Profissão</label>
                                    <input type="text" class="form-control @error('profissao') is-invalid @enderror"
                                        id="profissao" name="profissao" value="{{ old('profissao') }}">
                                    @error('profissao')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="mostrar_conjuge">
                                <label class="form-check-label" for="mostrar_conjuge">Possui Cônjuge</label>
                            </div>

                            <div id="campos_conjuge" style="display: none;">
                                <!-- Campos para o cônjuge -->
                                <h4 class="mt-4">Dados do Cônjuge</h4>

                                <div class="mb-3">
                                    <label for="nome_conjuge" class="form-label">Nome do Cônjuge</label>
                                    <input type="text"
                                        class="form-control @error('nome_conjuge') is-invalid @enderror"
                                        id="nome_conjuge" name="nome_conjuge" value="{{ old('nome_conjuge') }}">
                                    @error('nome_conjuge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="cpf_conjuge" class="form-label">CPF do Cônjuge</label>
                                            <input type="text"
                                                class="form-control @error('cpf_conjuge') is-invalid @enderror"
                                                id="cpf_conjuge" name="cpf_conjuge"
                                                value="{{ old('cpf_conjuge') }}">
                                            @error('cpf_conjuge')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="rg_conjuge" class="form-label">RG do Cônjuge</label>
                                            <input type="text"
                                                class="form-control @error('rg_conjuge') is-invalid @enderror"
                                                id="rg_conjuge" name="rg_conjuge" value="{{ old('rg_conjuge') }}">
                                            @error('rg_conjuge')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="profissao_conjuge" class="form-label">Profissão do Cônjuge</label>
                                    <input type="text"
                                        class="form-control @error('profissao_conjuge') is-invalid @enderror"
                                        id="profissao_conjuge" name="profissao_conjuge"
                                        value="{{ old('profissao_conjuge') }}">
                                    @error('profissao_conjuge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- Campos para endereço -->
                            <h4 class="mt-4">Endereço</h4>

                            <div class="mb-3">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control @error('cep') is-invalid @enderror"
                                    id="cep" name="cep" value="{{ old('cep') }}">
                                @error('cep')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="logradouro" class="form-label">Logradouro</label>
                                        <input type="text"
                                            class="form-control @error('logradouro') is-invalid @enderror"
                                            id="logradouro" name="logradouro" value="{{ old('logradouro') }}">
                                        @error('logradouro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="numero" class="form-label">Número</label>
                                        <input type="text"
                                            class="form-control @error('numero') is-invalid @enderror" id="numero"
                                            name="numero" value="{{ old('numero') }}">
                                        @error('numero')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input type="text" class="form-control @error('complemento') is-invalid @enderror"
                                    id="complemento" name="complemento" value="{{ old('complemento') }}">
                                @error('complemento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <input type="text"
                                            class="form-control @error('cidade') is-invalid @enderror" id="cidade"
                                            name="cidade" value="{{ old('cidade') }}">
                                        @error('cidade')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text"
                                            class="form-control @error('estado') is-invalid @enderror" id="estado"
                                            name="estado" value="{{ old('estado') }}">
                                        @error('estado')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Campos para documentos -->
                            <h4 class="mt-4">Documentos</h4>

                            <div class="mb-3">
                                <label for="comprovante_endereco" class="form-label">Comprovante de Endereço</label>
                                <input type="file"
                                    class="form-control @error('comprovante_endereco') is-invalid @enderror"
                                    id="comprovante_endereco" name="comprovante_endereco">
                                @error('comprovante_endereco')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cnh_frente" class="form-label">Frente da CNH</label>
                                <input type="file" class="form-control @error('cnh_frente') is-invalid @enderror"
                                    id="cnh_frente" name="cnh_frente">
                                @error('cnh_frente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cnh_verso" class="form-label">Verso da CNH</label>
                                <input type="file" class="form-control @error('cnh_verso') is-invalid @enderror"
                                    id="cnh_verso" name="cnh_verso">
                                @error('cnh_verso')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="certidao_civil" class="form-label">Certidão Civil (nascimento ou
                                    casamento)</label>
                                <input type="file"
                                    class="form-control @error('certidao_civil') is-invalid @enderror"
                                    id="certidao_civil" name="certidao_civil">
                                @error('certidao_civil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campos para holerite -->
                            <h4 class="mt-4">Holerite ou comprovante de renda</h4>

                            <div class="mb-3">
                                <label for="holerite_1" class="form-label">Holerite 1</label>
                                <input type="file" class="form-control @error('holerite_1') is-invalid @enderror"
                                    id="holerite_1" name="holerite_1">
                                @error('holerite_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="holerite_2" class="form-label">Holerite 2</label>
                                <input type="file" class="form-control @error('holerite_2') is-invalid @enderror"
                                    id="holerite_2" name="holerite_2">
                                @error('holerite_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="holerite_3" class="form-label">Holerite 3</label>
                                <input type="file" class="form-control @error('holerite_3') is-invalid @enderror"
                                    id="holerite_3" name="holerite_3">
                                @error('holerite_3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <h4 class="mt-4">Imóvel</h4>

                            <div class="mb-3">
                                <label for="matricula_imovel" class="form-label">Matrícula do Imóvel ou Certidão de Inteiro Teor</label>
                                <input type="file"
                                    class="form-control @error('matricula_imovel') is-invalid @enderror"
                                    id="matricula_imovel" name="matricula_imovel">
                                @error('matricula_imovel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}



                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Cadastrar Locatário</button>
                                <a href="{{ url('/') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Script para mostrar/ocultar campos do cônjuge quando o checkbox for clicado
        $(document).ready(function() {
            // Quando o checkbox for clicado
            $('#mostrar_conjuge').on('click', function() {
                // Se estiver marcado, mostra os campos do cônjuge
                if ($(this).prop('checked')) {
                    $('#campos_conjuge').show();
                } else {
                    // Caso contrário, oculta os campos do cônjuge
                    $('#campos_conjuge').hide();
                }
            });
        });
    </script>
</body>

</html>
