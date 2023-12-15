<!-- resources/views/teste/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Registros</title>
    <!-- Adicione o link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Lista registros</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('teste.create') }}" class="btn btn-primary mb-3">Criar Novo</a>

    @if(count($dados) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>cep</th>
                    <th>rua</th>
                    <th>bairro</th>
                    <th>numero</th>
                 
                    <th>cidade</th>
                    <th>uf</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $registro)
                    <tr>
                        <td>{{ $registro->nome_completo }}</td>
                        <td>{{ $registro->cpf }}</td>
                        <td>{{ $registro->telefone }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->cep }}</td>
                        <td>{{ $registro->rua }}</td>
                        <td>{{ $registro->bairro }}</td>
                        <td>{{ $registro->numero }}</td>
                    
                        <td>{{ $registro->cidade }}</td>
                        <td>{{ $registro->uf }}</td>
                        <td>
                            <a href="{{ route('teste.edit', ['id' => $registro->id]) }}" class="btn btn-warning">Editar</a>
                            <form method="POST" action="{{ route('teste.destroy', ['id' => $registro->id]) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
</td>
<td>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum registro encontrado.</p>
    @endif

    <!-- Adicione o script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
