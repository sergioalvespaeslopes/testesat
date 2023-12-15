<?php
// app/Http/Controllers/ClienteApiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Database\QueryException;

class ClienteApiController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();

        return response()->json($clientes, 200);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente não encontrado'], 404);
        }

        return response()->json($cliente, 200);
    }

    public function store(Request $request)
    {
        try {
            $cliente = new Cliente([
                'nome_completo' => $request->input('nome_completo'),
                'cpf' => $request->input('cpf'),
                'telefone' => $request->input('telefone'),
                'email' => $request->input('email'),
                'cep' => $request->input('cep'),
                'rua' => $request->input('rua'),
                'bairro' => $request->input('bairro'),
                'numero' => $request->input('numero'),
                'endereco' => $request->input('endereco'),
                'cidade' => $request->input('cidade'),
                'uf' => $request->input('uf'),
            ]);
            $cliente->save();

            return response()->json($cliente, 201); // 201 Created
        } catch (QueryException $e) {
            \Log::error('Erro ao criar cliente: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao criar cliente', 'message' => $e->getMessage()], 500); // 500 Internal Server Error
        } catch (\Exception $e) {
            \Log::error('Erro ao criar cliente: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao criar cliente'], 500); // 500 Internal Server Error
        }
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente não encontrado'], 404);
        }

        try {
            $cliente->update([
                'nome_completo' => $request->input('nome_completo'),
                'cpf' => $request->input('cpf'),
                'telefone' => $request->input('telefone'),
                'email' => $request->input('email'),
                'cep' => $request->input('cep'),
                'rua' => $request->input('rua'),
                'bairro' => $request->input('bairro'),
                'numero' => $request->input('numero'),
                'endereco' => $request->input('endereco'),
                'cidade' => $request->input('cidade'),
                'uf' => $request->input('uf'),
            ]);

            return response()->json($cliente, 200); // 200 OK
        } catch (QueryException $e) {
            \Log::error('Erro ao atualizar cliente: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao atualizar cliente', 'message' => $e->getMessage()], 500); // 500 Internal Server Error
        } catch (\Exception $e) {
            \Log::error('Erro ao atualizar cliente: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao atualizar cliente'], 500); // 500 Internal Server Error
        }
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente não encontrado'], 404);
        }

        try {
            $cliente->delete();

            return response()->json(['message' => 'Cliente excluído com sucesso'], 200); // 200 OK
        } catch (QueryException $e) {
            \Log::error('Erro ao excluir cliente: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao excluir cliente', 'message' => $e->getMessage()], 500); // 500 Internal Server Error
        } catch (\Exception $e) {
            \Log::error('Erro ao excluir cliente: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao excluir cliente'], 500); // 500 Internal Server Error
        }
    }
}
