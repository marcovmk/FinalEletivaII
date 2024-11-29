<x-app-layout>

    <h5>Novo Produto</h5>

    <form action="/produto" method="POST">
        @CSRF
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Nome do Produto:</label>
                <input type="text" name="nome" class="form-control"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" name="descricao" class="form-control"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" name="valor" class="form-control"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="categoria_id" class="form-label">Categoria:</label>
                <select name="categoria_id" class="form-select">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
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
