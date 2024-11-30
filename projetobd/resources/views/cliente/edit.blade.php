<x-app-layout>

    <h5>Alterar Cliente</h5>

    <form action="/cliente/{{$cliente->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Nome do Cliente:</label>
                <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" name="cpf" class="form-control" value="{{ $cliente->cpf }}" required maxlength="11"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" name="telefone" class="form-control" value="{{ $cliente->telefone }}" required/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" value="{{ $cliente->email }}" required/>
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
