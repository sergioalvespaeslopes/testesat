<?php

namespace App\Http\Controllers;

use App\Models\Teste;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        $dados = Teste::all();
        return view('teste.index', ['dados' => $dados]);
    }

    public function create()
    {
        return view('teste.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required',
            'cpf' => 'required|unique:testes',
            'telefone' => 'required',
        ]);

        Teste::create($request->all());

        return redirect()->route('teste.index')->with('success', 'Registro criado com sucesso!');
    }

    public function edit($id)
    {
        $registro = Teste::findOrFail($id);
        return view('teste.edit', ['registro' => $registro]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_completo' => 'required',
            'cpf' => 'required|unique:testes,cpf,'.$id,
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

        return redirect()->route('teste.index')->with('success', 'Registro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $registro = Teste::findOrFail($id);
        $registro->delete();

        return redirect()->route('teste.index')->with('success', 'Registro deletado com sucesso!');
    }
}
