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
<div class="row">
  <div class="col-md-8">
    <div class="x_panel">
      <div class="x_title">
        <h4>Transaksi Pembelian</h4>
      </div>
      <div class="x_content">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">Jenis Barang</label>
            <div class="col-sm-8">
              <select class="form-control" id="jenisbarang">
                <option>Beras Pandan Wangi</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Merk Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="merkbarang" placeholder="Top Brand">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Jumlah Barang</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="jumlahinventory" placeholder="20">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Harga Total</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="harga" placeholder="200.000">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Kadaluarsa</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="tanggal_kadaluarsa" placeholder="Tanggal kadaluarsa">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-3">
              <button type="submit" class="btn btn-primary">
                Tambahkan
              </button>
            </div>
          </div>
        </form>
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Jenis</th>
              <th>Merek</th>
              <th class="text-center">Jumlah</th>
              <th>Kadaluarsa</th>
              <th class="text-right">Harga Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>Beras Pandan Wangi</td>
              <td>Top Brand</td>
              <td class="text-center">2</td>
              <td>26 Okt 2017</td>
              <td class="text-right">100.000</td>
              <td class="text-center"><a class="text-danger"><i class="fa fa-close"></i></a></td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td>Beras Pandan Wangi</td>
              <td>Top Brand</td>
              <td class="text-center">2</td>
              <td>26 Okt 2017</td>
              <td class="text-right">100.000</td>
              <td class="text-center"><a class="text-danger"><i class="fa fa-close"></i></a></td>
            </tr>
          </tbody>
        </table>
        <div class="text-right">
          <h4>Total = 200.000</h4>
          <button class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
$(function(){
  $("#pilihinventory").selectize();
  $("#pilihoperasional").selectize();
})
</script>
@endsection