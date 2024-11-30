<x-app-layout>
    <h5>Cadastrar Novo Cliente</h5>

    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Nome do Cliente:</label>
                <input type="text" name="nome" class="form-control" required/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" name="cpf" class="form-control" required maxlength="11"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" name="telefone" class="form-control" required/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" required/>
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
