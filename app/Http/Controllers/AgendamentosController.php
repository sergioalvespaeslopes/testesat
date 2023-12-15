<?php

namespace App\Http\Controllers;

use App\Models\Agendamento; // Importe o modelo Agendamento
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all(); // Consulta todos os registros na tabela Agendamentos

        return view('agendamentos.agendamentos', ['agendamentos' => $agendamentos]);
    }
}
