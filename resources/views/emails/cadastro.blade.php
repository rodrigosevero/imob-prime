<!DOCTYPE html>
<html>

<head>
    <title>Novo cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-4">
                    <div class="card-body">
                        <h3>Novo cadastro: {{ $data['nome']  }}</h3>
                        <p>
                            Tipo: {{ $data['tipo']  }}<br>
                            Data do Pedido: {{ $data['data_pedido'] }}
                        </p>

                        <p>
                            <a href="https://cadastroimobprime.com.br/login">ACESSAR SISTEMA</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>