@extends('app')

@include('plugins.selectize')

@section('content')
<form method="post" action="{{url('transaksi/penjualan')}}">
  {{csrf_field()}}
  @verbatim
  <div class="box" ng-controller="penjualan">
    <div class="box-body">
      <div class="row">
        <div class="col-lg-6 col-md-10">
          <h4>Tambah barang</h4>
          <div class="form-horizontal">
            <div class="form-group">
              <label class="col-md-3 control-label">Inventory</label>
              <div class="col-md-9">
                <select id="pilihinventory" ng-model="pilihinventory" placeholder="Pilih inventory"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Jumlah</label>
              <div class="col-md-9">
                <input type="number" class="form-control" ng-model="jumlahinventory" placeholder="Jumlah inventory">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Harga</label>
              <div class="col-md-9">
                <input class="form-control" id="hargainventory" ng-model="hargainventory" disabled>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-3 col-md-9">
                <button type="button" class="btn btn-primary" ng-click="tambahinventory()">Tambahkan</button>
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
              <tr ng-if="table_inventory.length <= 0">
                <td colspan="5"><span class="text-muted">Tidak ada barang</span></td>
              </tr>
              <tr ng-repeat="row in table_inventory">
                <td class="hidden">
                  <input name="inventory[{{$index}}][inventory_id]" value="{{row.id}}">
                  <input name="inventory[{{$index}}][inventory_jenis]" value="{{row.jenis_id}}">
                  <input name="inventory[{{$index}}][jumlah]" value="{{row.jumlah_terpilih}}">
                  <input name="inventory[{{$index}}][harga]" value="{{row['jenis.latest_kurs.harga']}}">
                  <input name="inventory[{{$index}}][harga_total]" value="{{row.harga_terpilih_total}}">
                </td>
                <td class="text-center">{{$index + 1}}</td>
                <td>{{row['jenis.nama']}} {{row.merek}}</td>
                <td class="text-right">{{row.jumlah_terpilih}}</td>
                <td class="text-right">{{row.harga_terpilih_total}}</td>
                <td><i class="fa fa-close"></i></td>
              </tr>
            </tbody>
          </table>
          <hr class="hidden-lg">
        </div>
        <div class="col-lg-6 col-md-10">
          <h4>Tambah operasional</h4>
          <div class="form-horizontal">
            <div class="form-group">
              <label class="col-md-3 control-label">Operasional</label>
              <div class="col-md-9">
                <select id="pilihoperasional" placeholder="Pilih operasional"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Biaya</label>
              <div class="col-md-9">
                <input type="number" class="form-control" ng-model="hargaoperasional" placeholder="Biaya operasional">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-3 col-md-9">
                <button type="button" class="btn btn-primary" ng-click="tambahoperasional()">Tambahkan</button>
              </div>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Operasional</th>
                <th class="text-right">Harga</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-if="table_operasional.length <= 0">
                <td colspan="4"><span class="text-muted">Tidak ada operasional</span></td>
              </tr>
              <tr ng-repeat="row in table_operasional">
                <td class="hidden">
                  <input name="operasional[{{$index}}][jenis_operasional_id]" value="{{row.id}}">
                  <input name="operasional[{{$index}}][biaya]" value="{{row.harga_terpilih}}">
                </td>
                <td class="text-center">{{$index + 1}}</td>
                <td>{{row['jenis.nama']}} {{row.nama}}</td>
                <td class="text-right">{{row.harga_terpilih}}</td>
                <td><i class="fa fa-close"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-12">
        <hr>
        <div class="text-right">
          <h4>Total = {{total}}</h4>
          <input type="hidden" name="total" value="{{total}}">
          <button class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>
  @endverbatim
</form>
@endsection

@section('js')
<script>
app.controller("penjualan", function($scope) {
  $scope.total = 0;

  /* All about inventory */
  var inventory = null;
  $scope.table_inventory = [];
  var selected_inventory = [];
  $scope.tambahinventory = function() {
    if (inventory.items.length == 0) {
      return alert('Barang harus dipilih');
    }
    var index = inventory.items[0];
    if (selected_inventory.indexOf(index) >= 0) {
      return alert('Barang yang sudah dipilih tidak dapat dipilih lagi')
    }
    var selected = inventory.options[index];
    if (!($scope.jumlahinventory > 0 && $scope.jumlahinventory <= selected.jumlah_aktual)) {
      return alert('Jumlah harus sesuai dengan stok yang ada');
    }
    selected.jumlah_terpilih = $scope.jumlahinventory;
    selected.harga_terpilih_total = selected['jenis.latest_kurs.harga'] * $scope.jumlahinventory;
    $scope.table_inventory.push(selected);
    selected_inventory.push(index);
    $scope.total += selected.harga_terpilih_total;
  }

  /* All about operasional */
  var operasional = null;
  $scope.table_operasional = [];
  var selected_operasional = [];
  $scope.tambahoperasional = function() {
    if (operasional.items.length == 0) {
      return alert('Jenis operasional harus dipilih');
    }
    var index = operasional.items[0];
    if (selected_operasional.indexOf(index) >= 0) {
      return alert('Jenis operasional yang sudah dipilih tidak dapat dipilih lagi')
    }
    var selected = operasional.options[index];

    selected.harga_terpilih = $scope.hargaoperasional;
    $scope.table_operasional.push(selected);
    selected_operasional.push(index);
    $scope.total += selected.harga_terpilih;
  }

  /* Initialize Selectize */
  $(function() {
    inventory = $("#pilihinventory").selectize({
      valueField: 'id',
      labelField: 'jenis.nama',
      searchField: ['jenis.nama', 'merek'],
      create: false,
      options: {!!json_encode($dotinvent)!!},
      render: {
        option: function(item, escape) {
          return '<div>' +
            '<strong>' + escape(item['jenis.nama']) + '</strong>' +
            '<div class="row small">' +
              '<div class="col-sm-6">' +
                '<span><strong>Merek: </strong>' + escape(item.merek) + '</span><br>' +
                '<span><strong>Stok: </strong>' + escape(item.jumlah_aktual) + '</span>' +
              '</div>' +
              '<div class="col-sm-6">' +
                '<span><strong>Tanggal Beli: </strong>' + escape(item.tanggal_masuk) + '</span><br>' +
                '<span><strong>Kadaluarsa: </strong>' + escape(item.tanggal_kadaluarsa) + '</span>' +
              '</div>' +
            '</div>' +
          '</div>';
        }
      },
    })[0].selectize;
    operasional = $("#pilihoperasional").selectize({
      valueField: 'id',
      labelField: 'nama',
      searchField: 'nama',
      create: false,
      options: {!!json_encode($operasional)!!},
    })[0].selectize;

    /* Selectize event listener */
    inventory.on("change", function(value) {
      if (value != "") {
        console.log(value);
        selected = inventory.options[value]
        console.log(selected);
        $scope.hargainventory = selected['jenis.latest_kurs.harga'];
        $scope.jumlahinventory = selected.jumlah_aktual;
        $scope.$apply();
      }
    })
  })
});
</script>
@endsection