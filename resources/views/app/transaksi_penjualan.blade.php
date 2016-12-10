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
      <div class="col-md-6">
        <form class="">
          <label>Tambah inventory</label>
          <div class="form-group">
            <select id="pilihinventory">
              <value="">Pilih inventory</option>
              <option>Beras Pandan Wangi 20kg</option>
              <option>Beras Pandan Wangi 50kg</option>
              <option>Jagung Manis Hangat 10kg</option>
            </select>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="jumlahinventory" placeholder="Jumlah inventory">
          </div>
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i>
          </button>
        </form>
        <hr>
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
              <td>Beras Pandan Wangi 20kg</td>
              <td class="text-right">2</td>
              <td class="text-right">100.000</td>
              <td><i class="fa fa-close"></i></td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td>Beras Pandan Wangi 50kg</td>
              <td class="text-right">1</td>
              <td class="text-right">100.000</td>
              <td><i class="fa fa-close"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <form class="">
          <label>Tambah operasional</label>
          <div class="form-group">
            <select id="pilihoperasional">
              <option value="">Pilih operasional</option>
              <option>Kuli</option>
              <option>Karung</option>
            </select>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="hargaoperasional" placeholder="Biaya operasional">
          </div>
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i>
          </button>
        </form>
        <hr>
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
  $("#pilihinventory").selectize();
  $("#pilihoperasional").selectize();
})
</script>
@endsection