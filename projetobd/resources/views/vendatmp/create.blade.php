<x-app-layout>

    <h5>Cadastrar Nova Venda</h5>

    <form action="/vendatmp" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <label for="cliente_id" class="form-label">Cliente:</label>
                <select name="cliente_id" class="form-select">
                    @foreach ($clientes as $cli)
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

        <div id="produtos-container">
            <div class="row produto-item">
                <div class="col">
                    <label for="produtos_id" class="form-label">Produto:</label>
                    <select name="produtos_id[]" class="form-select" required>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="qtde" class="form-label">Quantidade:</label>
                    <input type="number" name="qtde[]" class="form-control" min="1" required />
                </div>
                <div class="col">
                    <label for="valor" class="form-label">Valor:</label>
                    <input type="number" name="valor[]" class="form-control" step="0.01" required />
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger remove-product" style="margin-top: 30px;">Remover Produto</button>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="button" class="btn btn-success" id="add-product">Adicionar Produto</button>
            </div>
        </div>

        <!-- Campo Total (Não editável) -->
        <div class="row mt-3">
            <div class="col">
                <label for="total" class="form-label">Total da Venda:</label>
                <input type="text" id="total" class="form-control" name="total" readonly />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Salvar Venda</button>
            </div>
        </div>
    </form>

    <script>
        // Função para adicionar um novo produto
        document.getElementById('add-product').addEventListener('click', function() {
            var newProductRow = document.querySelector('.produto-item').cloneNode(true); // Clona a primeira linha de produto
            newProductRow.querySelectorAll('input').forEach(input => input.value = ''); // Limpa os campos de entrada
            document.getElementById('produtos-container').appendChild(newProductRow); // Adiciona a nova linha ao container

            // Atualiza o total sempre que um novo produto for adicionado
            updateTotal();
        });

        // Função para remover um produto
        document.getElementById('produtos-container').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-product')) {
                // Certifique-se de que ao remover, apenas a linha específica seja excluída
                if (document.querySelectorAll('.produto-item').length > 1) {
                    event.target.closest('.produto-item').remove(); // Remove a linha do produto
                    updateTotal(); // Atualiza o total ao remover um produto
                }
            }
        });

        // Função para atualizar o total da venda
        function updateTotal() {
            let total = 0;
            const produtos = document.querySelectorAll('.produto-item');
            produtos.forEach(function(produto) {
                const qtde = produto.querySelector('input[name="qtde[]"]').value;
                const valor = produto.querySelector('input[name="valor[]"]').value;

                if (qtde && valor) {
                    total += parseFloat(qtde) * parseFloat(valor); // Calcula o total
                }
            });

            // Atualiza o campo total
            document.getElementById('total').value = total.toFixed(2); // Exibe o total com 2 casas decimais
        }

        // Função para calcular e atualizar o total quando a quantidade ou valor de um produto for alterado
        document.getElementById('produtos-container').addEventListener('input', function(event) {
            if (event.target && (event.target.name === 'qtde[]' || event.target.name === 'valor[]')) {
                updateTotal(); // Atualiza o total sempre que a quantidade ou valor for alterado
            }
        });

        // Valida o total de cada produto antes de salvar
        document.querySelector('form').addEventListener('submit', function(event) {
            const produtos = document.querySelectorAll('.produto-item');
            let valid = true;

            produtos.forEach(function(produto) {
                const qtde = produto.querySelector('input[name="qtde[]"]').value;
                const valor = produto.querySelector('input[name="valor[]"]').value;

                // Verifica se quantidade ou valor estão em branco
                if (!qtde || !valor) {
                    alert("Por favor, preencha a quantidade e o valor de todos os produtos.");
                    valid = false;
                    return false; // Interrompe a execução do loop
                }
            });

            if (valid) {
                updateTotal(); // Atualiza o total antes de enviar o formulário
            } else {
                event.preventDefault(); // Previne o envio do formulário se os dados forem inválidos
            }
        });
    </script>

</x-app-layout>
