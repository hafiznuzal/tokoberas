@extends('app')

@include('plugins.chartjs')

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h4>Grafik perbandingan pemasukan dengan pengeluaran</h4>
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

  pengeluaran = {!! $pengeluaran !!};
  pemasukan = {!! $pemasukan !!};
  total = pengeluaran + pemasukan;
  pengeluaran$ = pengeluaran / total * 100;
  pemasukan$ = pemasukan / total * 100;
  var areaChartData = {
    labels: ['Pengeluaran ' + Math.round(pemasukan$) + '%', 'Pemasukan ' + Math.round(pengeluaran$) + '%'],
    datasets: [
      {
        data: [pemasukan, pengeluaran],
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