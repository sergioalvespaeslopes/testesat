<!-- resources/views/agendamentos/agendamentos.blade.php -->

<h1>Listagem de Agendamentos</h1>

<ul>
    @foreach ($agendamentos as $agendamento)
        <li>
            {{ $agendamento->nome }} - 
            {{ \Carbon\Carbon::parse($agendamento->data_agendamentos)->format('d/m/Y') }} - 
            {{ $agendamento->cpf }}
        </li>
    @endforeach
</ul>
