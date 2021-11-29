@extends('templates/secretario')

@section('css')
@endsection

@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['armazenamento', 'utilizado'],
            ['Livre', 50],
            ['Ocupado', 96],
        ]);

        var options = {
            title: 'Total 15 GB',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
@endsection

@section('pagina')
<section class="grafico">
    <center>
        <div class="card border-dark mb-3">
            <div class="card-header">Armazenamento Pessoal</div>
            <div class="card-body text-dark">
                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
    </center>
</section>
@endsection