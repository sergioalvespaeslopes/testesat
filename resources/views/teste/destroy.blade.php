<!-- resources/views/teste/destroy.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Registro</title>
</head>
<body>
    <h1>Excluir Registro</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <p>Tem certeza de que deseja excluir este registro?</p>

    <form method="POST" action="{{ route('teste.destroy', ['id' => $registro->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Sim, Excluir</button>
    </form>

    <a href="{{ route('teste.index') }}">Cancelar</a>
</body>
</html>
