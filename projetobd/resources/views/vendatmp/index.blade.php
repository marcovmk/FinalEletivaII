<x-app-layout>

    <h5>Gerenciar Vendas</h5>

    <a class="btn btn-success" href="/vendatmp/create">
        Inserir nova Venda
    </a>

    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Nome do Funcionário</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendatmp as $venda)
                <tr>
                    <td>{{ $venda->cliente->nome }}</td>
                    <td>{{ $venda->nome_funcionario }}</td>
                    <td>{{ number_format($venda->total, 2, ',', '.') }}</td>
                    <td>
                        <a href='/vendatmp/{{ $venda->id }}/edit' class="btn btn-warning">Editar</a>
                        <a href='/vendatmp/{{ $venda->id }}' class='btn btn-info'>Ver Detalhes</a>
                        <a href='/vendatmp/{{ $venda->id }}/delete' class='btn btn-danger'>Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
