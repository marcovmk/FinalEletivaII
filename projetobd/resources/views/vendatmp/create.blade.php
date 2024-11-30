<x-app-layout>

    <h5>Cadastrar Nova Venda</h5>

    <form action="/vendatmp" method="POST">
        @CSRF
        <div class="row">
            <div class="col">
                <label for="cliente_id" class="form-label">Cliente:</label>
                <select name="cliente_id" class="form-select">
                    @foreach ($cliente as $cli)
                        <option value="{{ $cli->id }}">{{ $cli->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="nome_funcionario" class="form-label">Nome do Funcionário:</label>
                <input type="text" name="nome_funcionario" class="form-control" required />
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="produtos" class="form-label">Produto:</label>
                <select name="produtos_id" class="form-select">
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="qtde" class="form-label">Quantidade:</label>
                <input type="number" name="qtde" class="form-control" min="1" required />
            </div>
            <div class="col">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" name="valor" class="form-control" required />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Salvar Venda</button>
            </div>
        </div>
    </form>

</x-app-layout>
