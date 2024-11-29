<x-app-layout>

    <h5>Nova Categoria</h5>

    <form action="/categoria" method="POST">
        @CSRF
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe a categoria:</label>
                <input type="text" name="nome" class="form-control"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </div>
    </form>

</x-app-layout>