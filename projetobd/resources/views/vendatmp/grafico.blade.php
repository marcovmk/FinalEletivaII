@extends('layouts.app')

@section('title', 'Quantidade Vendida por Produto')

@section('content')

    <h5 class="mt-3">Quantidade Vendida dos Produtos</h5>

    <!-- Carregar a biblioteca do Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Carregar o pacote corechart do Google Charts
        google.charts.load('current', {'packages':['corechart']});
        
        // Quando o Google Charts terminar de carregar, executa a função abaixo
        google.charts.setOnLoadCallback(drawChart);

        // Função para desenhar o gráfico
        function drawChart() {
            // Criando os dados para o gráfico de pizza
            var data = google.visualization.arrayToDataTable($dadosVendasPorProduto);

            // Definição das opções do gráfico
            var options = {
                title: 'Quantidade Vendida por Produto',
                backgroundColor: 'transparent',
                slices: {
                    0: {offset: 0.1}, // Ajusta o offset da primeira fatia (opcional)
                },
                legend: { position: 'right' }
            };

            // Criar o gráfico de Pizza e desenhar ele dentro da div 'piechart'
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>

    <!-- Div onde o gráfico será renderizado -->
    <div class="d-flex justify-content-center">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>

@endsection
