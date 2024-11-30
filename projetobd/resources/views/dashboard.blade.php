<x-app-layout>
    <div style="background-image: url('images/naregua4.jpg'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0; overflow: hidden;">
        <div class="text-center" style="padding-top: 20%;">
            <h5 class="mt-3" style="color: white;">Bem-vindo ao Gerenciamento do Sistema!</h5>
            <div class="mt-4" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 10px; padding: 20px;">
                <h6 class="mb-3">Funcionalidades disponíveis:</h6>
                <div class="row">
                    <!-- Primeira coluna -->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Clientes</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('cliente.index') }}" class="text-dark">Visualizar Clientes</a></li>
                                    <li><a href="{{ route('cliente.create') }}" class="text-dark">Adicionar Novo Cliente</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Segunda coluna -->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Produtos</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('produto.index') }}" class="text-dark">Visualizar Produtos</a></li>
                                    <li><a href="{{ route('produto.create') }}" class="text-dark">Adicionar Novo Produto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                     <!-- Terceira coluna: Vendas -->
                     <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Vendas</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('venda.index') }}" class="text-dark">Visualizar Vendas</a></li>
                                    <li><a href="{{ route('venda.create') }}" class="text-dark">Adicionar Nova Venda</a></li>
                                    <li><a href="{{ route('venda.grafico') }}" class="text-dark">Gráfico de Vendas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>   
                                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
