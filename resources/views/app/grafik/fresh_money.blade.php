@extends('app')

@include('plugins.chartjs')

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h4>Grafik posisi fresh money</h4>
  </div>
  <div class="box-body">
    <canvas id="freshMoneyChart" width="400" height="170"></canvas>
  </div>
</div>
@endsection

@section('js')
<script>
$(function() {
  var ctx = document.getElementById("freshMoneyChart");

  sisa = {!! $sisa !!};
  jual = {!! $jual !!};
  total = sisa + jual;
  sisa$ = sisa / total * 100;
  jual$ = jual / total * 100;
  var areaChartData = {
    labels: ['Fresh money ' + Math.round(jual$) + '%', 'Belum terjual ' + Math.round(sisa$) + '%'],
    datasets: [
      {
        data: [jual, sisa],
        backgroundColor: ["#FFCE56", "#36A2EB"]
      }
    ]
  };

  var myChart = new Chart(ctx, {
    type: 'pie',
    data: areaChartData,
  });
})
</script>
@endsection