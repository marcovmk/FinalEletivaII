<x-app-layout>

    <h5 class="mt-3">Gerenciar Categorias</h5>

    <a class="btn btn-success" href="/categoria/create">
        Inserir nova Categoria
    </a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $c)
            <tr>
                <td>{{ $c->nome }}</td>
                <td>
                    <a href="/categoria/{{ $c->id }}/edit" class="btn btn-warning">Alterar</a>
                    <a href="/categoria/{{ $c->id }}" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>