@extends('app')

@include('plugins.chartjs')

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h4>Grafik komposisi penjualan</h4>
  </div>
  <div class="box-body">
    <canvas id="komposisiChart" width="400" height="200"></canvas>
  </div>
</div>
@endsection

@section('js')
<script>
$(function() {
  var ctx = document.getElementById("komposisiChart");

  var data = {
    labels: {!! $jenis !!},
    datasets: [
      {
        // label: "My First dataset",
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        data: {!! $jumlah !!},
      }
    ]
  };

  @if (count($jenis) > 1)
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
  });
  @endif

})
</script>
@endsection