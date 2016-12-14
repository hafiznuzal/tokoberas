@extends('app')

@include('plugins.daterangepicker')

@section('content')
<div class="row" ng-controller="pembelian">
  <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
    <div class="box">
      <div class="box-header">
        <h4>Transaksi Pembelian</h4>
      </div>
      <div class="box-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">Jenis Barang</label>
            <div class="col-sm-8">
              <select class="form-control" ng-model="jenis">
                @foreach ($jenis as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Merk Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" ng-model="merek" placeholder="Top Brand">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Jumlah Barang</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="jumlah" ng-model="jumlah" placeholder="20">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Kadaluarsa</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="tgl_kadaluarsa" ng-model="tanggal_kadaluarsa" placeholder="Tanggal kadaluarsa">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Harga Total</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" ng-model="harga" placeholder="200.000">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-3">
              <button type="submit" class="btn btn-primary" ng-click="tambah_pembelian()">
                Tambahkan
              </button>
            </div>
          </div>
        </div>
        <form id="form-pembelian" method="post" action="{{url('transaksi/pembelian')}}">
          {{ csrf_field() }}
          @verbatim
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
              <tr ng-if="rows.length <= 0">
                <td colspan="7"><span class="text-muted">Tidak ada barang</span></td>
              </tr>
              <tr ng-repeat="row in rows">
                <td class="hidden">
                  <input name="pembelian[{{$index}}][jenis_id]" value="{{row.jenis}}">
                  <input name="pembelian[{{$index}}][merek]" value="{{row.merek}}">
                  <input name="pembelian[{{$index}}][jumlah]" value="{{row.jumlah}}">
                  <input name="pembelian[{{$index}}][tanggal_kadaluarsa]" value="{{row.tanggal_kadaluarsa}}">
                  <input name="pembelian[{{$index}}][harga]" value="{{row.harga}}">
                </td>
                <td class="text-center">{{$index + 1}}</td>
                <td>{{row.jenis}}</td>
                <td>{{row.merek}}</td>
                <td class="text-center">{{row.jumlah}}</td>
                <td>{{row.tanggal_kadaluarsa}}</td>
                <td class="text-right">{{row.harga}}</td>
                <td class="text-center"><a class="text-danger" ng-click="hapus(row)"><i class="fa fa-close"></i></a></td>
              </tr>
            </tbody>
          </table>
          <div class="text-right">
            <h4>Total = {{total}}</h4>
            <input type="hidden" name="total" value="{{total}}">
            <button class="btn btn-success">Submit</button>
          </div>
          @endverbatim
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
(function(){
  app.controller("pembelian", function($scope) {
    $scope.total = 0;
    $scope.rows = [];

    reset = function() {
      $scope.merek = '';
      $scope.jumlah = 0;
      $scope.harga = 0;
      $scope.tanggal_kadaluarsa = '';
    }
    reset();

    $scope.tambah_pembelian = function() {
      row = {
        jenis: $scope.jenis,
        merek: $scope.merek,
        jumlah: $scope.jumlah,
        harga: $scope.harga,
        tanggal_kadaluarsa: $scope.tanggal_kadaluarsa,
      };
      if (row.jenis == undefined || !(row.jumlah > 0) || !(row.harga > 0) || row.tanggal_kadaluarsa == '') {
        alert("lengkapi isian pembelian.");
        return;
      }
      $scope.total += row.harga;
      $scope.rows.push(row);

      reset();
    }
    $scope.hapus = function(row) {
      $scope.total -= row.harga;
      index = $scope.rows.indexOf(row);
      $scope.rows.splice(index, 1);
    }

    $('#tgl_kadaluarsa').daterangepicker({
      format: 'YYYY-MM-DD',
      singleDatePicker: true,
      calender_style: "picker_2"
    }, function(start, end, label) {
      $scope.tanggal_kadaluarsa = start.format('YYYY-MM-DD');
    });

    $("#form-pembelian").submit(function() {
      return $scope.rows.length > 0;
    })
  });
})();
</script>
@endsection