@extends('app')
@section('content')
<div class="row">
  <div class="col-lg-6 col-sm-10">
    <div class="box box-primary">
      <div class="box-header">
        <h4>Detail Pembelian</h4>
      </div>
      <div class="box-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-4 control-label">Konsumen</label>
            <label class="col-sm-7 content-label">{{$nota->konsumen->nama}}</label>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Tanggal</label>
            <label class="col-sm-7 content-label">{{$nota->tanggal}}</label>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Modal</label>
            <label class="col-sm-7 content-label">{{number_format($nota->total_modal)}}</label>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Keuntungan Bersih</label>
            <label class="col-sm-7 content-label">{{number_format($nota->keuntungan_bersih)}}</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-10">
    <div class="box box-primary">
      <div class="box-header">
        <h4>Detail Operasional</h4>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Nama</th>
              <th class="text-right">Harga Satuan</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($nota->operasional as $op)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$op->jenis_operasional->nama}}</td>
              <td>{{$op->harga}}</td>
            </tr>
            @empty
            <tr>
              <td colspan="3" class="text-muted">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <div class="text-right">
          <h4>Total = {{number_format($nota->biaya)}}</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-10">
    <div class="box box-primary">
      <div class="box-header">
        <h4>Detail Barang</h4>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Nama</th>
              <th>Merek</th>
              <th class="text-right">Jumlah</th>
              <th class="text-right">Harga</th>
              <th class="text-right">Total</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($nota->item_transaksi as $item)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{$item->jenis->nama}}</td>
              <td>{{$item->inventory->merek}}</td>
              <td class="text-right">{{$item->jumlah}}</td>
              <td class="text-right">{{number_format($item->biaya)}}</td>
              <td class="text-right">{{number_format($item->biaya * $item->jumlah)}}</td>
            </tr>
            @empty
            <tr>
              <td colspan="3" class="text-muted">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <div class="text-right">
          <h4>Total harga = {{number_format($nota->total_harga)}}</h4>
          <h4>Total sudah dibayar = {{number_format($nota->total_pembayaran)}}</h4>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection