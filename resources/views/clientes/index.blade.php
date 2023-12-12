@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Cadastro de Clientes</h2>
            <button class="btn btn-success" data-toggle="modal" data-target="#createClienteModal">Novo Cliente</button>
            <br><br>

            <table id="clientesTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome_completo }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->cep }}</td>
                            <td>{{ $cliente->rua }}</td>
                            <td>{{ $cliente->bairro }}</td>
                            <td>{{ $cliente->numero }}</td>
                            <td>{{ $cliente->endereco }}</td>
                            <td>{{ $cliente->cidade }}</td>
                            <td>{{ $cliente->uf }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editClienteModal{{ $cliente->id }}">Editar</button>
                               
                            </td>
                            <td>
                          
                              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal{{ $cliente->id }}">Excluir</button>
                            </td>
                        </tr>

                        <!-- Modal para editar o cliente -->
                        <div class="modal fade" id="editClienteModal{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário para editar um cliente -->
                <form id="editClienteForm{{ $cliente->id }}" method="post" action="{{ route('clientes.update', ['id' => $cliente->id]) }}">
                    @csrf
                    @method('PUT') <!-- Use o método PUT para atualizações -->
                    
                    <!-- Campos do formulário -->
                    <div class="form-group">
                        <label for="nome_completo">Nome Completo</label>
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="{{ $cliente->nome_completo }}" required>
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $cliente->cpf }}" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $cliente->telefone }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{ $cliente->cep }}" required>
                    </div>

                    <div class="form-group">
                        <label for="rua">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua" value="{{ $cliente->rua }}" required>
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $cliente->bairro }}" required>
                    </div>

                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="{{ $cliente->numero }}" required>
                    </div>

                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $cliente->endereco }}" required>
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $cliente->cidade }}" required>
                    </div>

                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" value="{{ $cliente->uf }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="confirmDeleteModal{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Você tem certeza que deseja excluir o cliente: <strong>{{ $cliente->nome_completo }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('clientes.destroy', ['id' => $cliente->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function() {
            // Atualize a URL do formulário com o ID do cliente quando o modal é exibido
            $('#editClienteModal{{ $cliente->id }}').on('show.bs.modal', function (event) {
                var form = $(this).find('form');
                var action = form.attr('action');
                // Atualize a ação do formulário para incluir o ID do cliente
                form.attr('action', action.replace('__ID__', '{{ $cliente->id }}'));
            });
        });
    </script>
</div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para criar um novo cliente -->
    <div class="modal fade" id="createClienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário para criar um novo cliente -->
                    <form id="createClienteForm" method="post" action="{{ route('clientes.store') }}">
                        @csrf <!-- Adicione o token CSRF para proteção contra CSRF -->

                        <div class="form-group">
                            <label for="nome_completo">Nome Completo</label>
                            <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required>
                        </div>

                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" required>
                        </div>

                        <div class="form-group">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua" required>
                        </div>

                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" required>
                        </div>

                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" required>
                        </div>

                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" required>
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required>
                        </div>

                        <div class="form-group">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" id="uf" name="uf" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
