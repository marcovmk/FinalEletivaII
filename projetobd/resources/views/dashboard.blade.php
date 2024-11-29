<x-app-layout>

    <h5 class="mt-3">Bem vindo ao sistema de controle de estoque!</h5>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Categorias', 'Valor Médio dos Produtos por Categoria'],
          @foreach($categorias as $index => $categoria)
            ["{{$categoria}}" , {{$valores_medios[$index]}}]
          @endforeach
        ]);

        var options = {
          title: 'Análise de produtos por categoria'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <div class="d-flex justify-content-center">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
</x-app-layout>
