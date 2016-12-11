@extends('app')

@include('plugins.selectize')

@section('css')
<style type="text/css">
  .form-inline .btn {
    margin-bottom: 0;
  }
</style>
@endsection

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h4>Transaksi Penjualan</h4>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-md-3 control-label">Inventory</label>
            <div class="col-md-9">
              <select id="pilihinventory" placeholder="Pilih inventory">
                
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Jumlah</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="jumlahinventory" placeholder="Jumlah inventory">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Inventory</th>
              <th class="text-right">Jumlah</th>
              <th class="text-right">Harga</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>Beras Pandan Wangi Top</td>
              <td class="text-right">20</td>
              <td class="text-right">100.000</td>
              <td><i class="fa fa-close"></i></td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td>Beras Pandan Wangi Top</td>
              <td class="text-right">20</td>
              <td class="text-right">100.000</td>
              <td><i class="fa fa-close"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-6">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-md-3 control-label">Operasional</label>
            <div class="col-md-9">
              <select id="pilihoperasional" placeholder="Pilih operasional">
                @foreach ($operasional as $op)
                <option value="{{$op->id}}">{{$op->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Biaya</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="hargaoperasional" placeholder="Biaya operasional">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Operasional</th>
              <th class="text-right">Jumlah</th>
              <th class="text-right">Harga</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>Kuli</td>
              <td class="text-right">4</td>
              <td class="text-right">200.000</td>
              <td><i class="fa fa-close"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
$(function(){
  $("#pilihinventory").selectize({
    valueField: 'id',
    labelField: 'jenis.nama',
    searchField: ['jenis.nama', 'merek'],
    create: false,
    options: {!!json_encode($dotinvent)!!},
    render: {
      option: function(item, escape) {
        return '<div>' +
          '<strong>' +
            escape(item['jenis.nama']) +
          '</strong>' +
          '<div class="row small">' +
            '<div class="col-sm-6">' +
              '<span>' + escape(item.merek) + '</span>' +
            '</div>' +
            '<div class="col-sm-6">' +
              '<span>' + escape(item.tanggal_masuk) + '</span>' +
            '</div>' +
            '<div class="col-sm-6">' +
              '<span><strong>Stok: </strong>' + escape(item.jumlah_aktual) + '</span>' +
          '</div>' +
        '</div>';
      }
    },
  });
  $("#pilihoperasional").selectize();
})
</script>
@endsection