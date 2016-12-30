@extends('app')

@include('plugins.chartjs')

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h4>Grafik komposisi operasional</h4>
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
        label: "Biaya operasional",
        backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
        ],
        borderColor: [
        'rgba(54, 162, 235, 1)',
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