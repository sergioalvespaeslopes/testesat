<?php

namespace App\Http\Controllers;

use App\Models\Teste;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApiTesteController extends Controller
{
    public function index()
    {
        $dados = Teste::all();
        return response()->json($dados, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required',
            'cpf' => 'required|unique:testes',
            'telefone' => 'required',
        ]);

        $registro = Teste::create($request->all());

        return response()->json($registro, 201);
    }

    public function show($id)
    {
        $registro = Teste::findOrFail($id);
        return response()->json($registro, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_completo' => 'required',
            'cpf' => ['required', Rule::unique('testes')->ignore($id)],
            'telefone' => 'required',
            'email' => 'required',
            'cep' => 'required',
            'rua' => 'required',
            'bairro' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
        ]);

        $registro = Teste::findOrFail($id);
        $registro->update($request->all());

        return response()->json($registro, 200);
    }

    public function destroy($id)
    {
        $registro = Teste::findOrFail($id);
        $registro->delete();

        return response()->json(null, 204);
    }
}
