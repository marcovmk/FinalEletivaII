<x-app-layout>

    <h5 class="mt-3">Gerenciar Clientes</h5>

    <a class="btn btn-success" href="/cliente/create">
        Inserir novo Cliente
    </a>

    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cliente as $cliente)
                <tr>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->cpf}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>
                        <a href='/cliente/{{$cliente->id}}/edit' class="btn btn-warning">Alterar</a>
                        <form action="/cliente/{{$cliente->id}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
