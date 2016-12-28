@extends('app')

@include('plugins.chartjs')

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h4>Grafik penjualan bulanan</h4>
  </div>
  <div class="box-body">
    <canvas id="keuntunganChart" width="400" height="200"></canvas>
  </div>
</div>
@endsection

@section('js')
<script>
$(function() {
  var ctx = document.getElementById("keuntunganChart");

  var red_ = 'rgba(255, 99, 132, 0.2)';
  var red = 'rgba(255,99,132,1)';
  var blue_ = 'rgba(54, 162, 235, 0.2)';
  var blue = 'rgba(54, 162, 235, 1)';

  var areaChartData = {
    labels: {!! $tanggal->toJson() !!},
    datasets: [
      {
        label: "Penjualan bulanan",
        fill: false,
        borderColor: blue,
        data: {!! $total_harga->toJson() !!}
      },
      // {
      //   label: "Digital Goods",
      //   backgroundColor: blue_,
      //   borderColor: blue,
      //   data: [28, 48, 40, 19, 86, 27, 90]
      // }
    ]
  };

  var myChart = new Chart(ctx, {
    type: 'line',
    data: areaChartData,
  });
})
</script>
@endsection