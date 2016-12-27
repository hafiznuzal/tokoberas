@extends('app')

@include('plugins.datatable')

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h4>Laporan Penjualan</h4>
  </div>
  <div class="box-body">
    <table id="datatable-buttons" class="table table-hover datatabel">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">No Nota</th>
          <th>Nama Pemesan</th>
          <th>Jumlah Pemesanan</th>
          <th>Tanggal Pemesanan</th>
          <th class="text-right">Total Biaya</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($nota as $jual)
        <tr>
          <td class="text-center">{{$loop->iteration}}</td>
          <td class="text-center">{{$jual->id}}</td>
          <td>{{$jual->konsumen->nama}}</td>
          <td>{{$jual->item_transaksi->count()}}</td>
          <td>{{$jual->tanggal}}</td>
          <td class="text-right">{{number_format($jual->total_harga)}}</td>
          <td>
            <a href="{{url('laporan_penjualan/'.$jual->id)}}" class="btn btn-default btn-sm">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('js')
@endsection