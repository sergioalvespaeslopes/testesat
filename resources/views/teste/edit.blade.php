<!-- resources/views/teste/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <!-- Adicione o link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Editar Registrofasd</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('teste.update', ['id' => $registro->id]) }}" class="mb-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome_completo" class="form-label">Nome Completo:</label>
            <input type="text" class="form-control" name="nome_completo" value="{{ $registro->nome_completo }}" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" name="cpf" value="{{ $registro->cpf }}" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="telefone" value="{{ $registro->telefone }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" name="email" value="{{ $registro->email }}" required>
        </div>

        <div class="mb-3">
            <label for="cep" class="form-label">CEP:</label>
            <input type="text" class="form-control" name="cep" id="cep" required>
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua:</label>
            <input type="text" class="form-control" name="rua" id="rua" required>
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro:</label>
            <input type="text" class="form-control" name="bairro" id="bairro" required>
        </div>


        <div class="mb-3">
            <label for="numero" class="form-label">numero:</label>
            <input type="text" class="form-control" name="numero" id="numero" required>
        </div>


        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" class="form-control" name="cidade" id="cidade" required>
        </div>

        <div class="mb-3">
            <label for="uf" class="form-label">UF:</label>
            <input type="text" class="form-control" name="uf" id="uf" required>
        </div>

        <!-- Adicione os demais campos de endereço (número, complemento, etc.) aqui -->

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

    <a href="{{ route('teste.index') }}" class="btn btn-secondary">Voltar para a Lista</a>

 
    <!-- Adicione o script do Bootstrap e o script para autocomplete do CEP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#cep').blur(function () {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep) {
                    $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                        if (!data.erro) {
                            $('#rua').val(data.logradouro);
        $('#bairro').val(data.bairro);
        $('#uf').val(data.uf);

        // Adicione os campos personalizados
  
        $('#cidade').val(data.localidade);
        // Preencha outros campos de endereço personalizados aqui
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
