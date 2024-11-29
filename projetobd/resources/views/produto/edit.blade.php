<x-app-layout>

    <h5>Alterar Produto</h5>

    <form action="/produto/{{$produto->id}}" method="POST">
        @CSRF
        @method('PUT')
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Nome do Produto:</label>
                <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" name="descricao" class="form-control" value="{{ $produto->descricao }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" name="valor" class="form-control" value="{{ $produto->valor }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="categoria_id" class="form-label">Categoria:</label>
                <select name="categoria_id" class="form-select">
				    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}"
                                {{ $produto->categoria->id == $categoria->id ? 'selected' : '' }}>
                                {{$categoria->nome}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </div>
    </form>

</x-app-layout>
