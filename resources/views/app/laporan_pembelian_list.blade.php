@extends('app')

@include('plugins.datatable')

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h4>Laporan Pembelian</h4>
  </div>
  <div class="box-body">
    <div class="table-responsive">
    <table id="datatable-buttons" class="table table-hover datatabel">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">No Nota</th>
          <th>Nama Produsen</th>
          <th>Jumlah Jenis Item</th>
          <th>Tanggal Pemesanan</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($modal as $beli)
        <tr>
          <td class="text-center">{{$loop->iteration}}</td>
          <td class="text-center">{{$beli->id}}</td>
          <td>{{$beli->produsen->nama}}</td>
          <td>{{$beli->inventory->count()}}</td>
          <td>{{$beli->tanggal}}</td>
          <td>
            <a href="{{url('laporan/pembelian/'.$beli->id)}}" class="btn btn-primary btn-sm">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection