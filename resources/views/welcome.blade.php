<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Incluindo o CSS do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <!-- Logo no topo centralizado -->
    <div class="logo">
        <img src="{{ asset('images/logo.jpg')}}" width="250px">
    </div>

    <div class="container">
        <h2 class="text-center mb-4">Escolha um formulário:</h2>

        <div class="row justify-content-center">
            <!-- Coluna 1 - Proprietário -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulário do Proprietário</h5>
                        <p class="card-text">Preencha o formulário de cadastro de Proprietário.</p>
                        <a href="{{ route('proprietarios.create')}}" class="btn btn-primary btn-block">Acessar Formulário</a><!-- O link do formulário real deve ser colocado no atributo href -->
                    </div>
                </div>
            </div>

            <!-- Coluna 2 - Locatário -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulário do Locatário</h5>
                        <p class="card-text">Preencha o formulário de cadastro de Locatário.</p>
                        <a href="{{ route('locatarios.create')}}" class="btn btn-primary btn-block">Acessar Formulário</a><!-- O link do formulário real deve ser colocado no atributo href -->
                    </div>
                </div>
            </div>

            <!-- Coluna 3 - Fiador -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulário do Fiador</h5>
                        <p class="card-text">Preencha o formulário de cadastro de Fiador.</p>
                        <a href="{{ route('fiadores.create')}}" class="btn btn-primary btn-block">Acessar Formulário</a><!-- O link do formulário real deve ser colocado no atributo href -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Link para a página de login -->
        <a href="{{ route('login')}}" class="login-link">Faça login aqui</a>

    </div>

</body>

</html>
