@extends('app')

@section('content')
<div class="row">
  <div class="col-lg-2 col-sm-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <a href="{{url('laporan/pembelian')}}" class="btn btn-primary btn-block">Kembali</a>
      </div>
    </div>
  </div>
  <div class="col-lg-10 col-sm-12">
    <div class="box box-primary">
      <div class="box-header">
        <h4>Detail Pembelian</h4>
      </div>
      <div class="box-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">Produsen</label>
            <label class="col-sm-7 content-label">{{$modal->produsen->nama}}</label>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal</label>
            <label class="col-sm-7 content-label">{{$modal->tanggal}}</label>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-primary">
      <div class="box-header">
        <h4>Detail Inventory</h4>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Jenis</th>
              <th>Merek</th>
              <th>Kadaluarsa</th>
              <th class="text-center">Jumlah</th>
              <th class="text-center">Karung</th>
              <th class="text-right">Harga Satuan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($modal->inventory as $inv)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{$inv->jenis->nama}}</td>
              <td>{{$inv->merek}}</td>
              <td>{{$inv->tanggal_kadaluarsa}}</td>
              <td class="text-center">{{$inv->jumlah}}</td>
              <td class="text-center">{{$inv->jumlah_karung}}</td>
              <td class="text-right">{{number_format($inv->harga_beli)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="text-right">
          <h4>Total = {{number_format($modal->biaya)}}</h4>
        </div>
      </div>
    </div>
    @if (Auth::user()->jabatan == 'admin')
    <div class="box box-primary">
      <div class="box-header">
        <h4>Perubahan transaksi</h4>
      </div>
      <div class="box-body">
        <button class="btn btn-primary" disabled title="Saat ini fitur belum tersedia"><i class="fa fa-pencil"></i> Edit</button>
        <button id="delete_this" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection

@section('js')
<script>
  $(function() {
    $("#delete_this").click(function() {
      swal({
        title: "Apakah anda yakin akan menghapus?",
        text: "Anda tidak dapat mengembalikan data yang terhapus!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
        closeOnConfirm: false,
        closeOnCancel: true
      },
      function(isConfirm){
        if (isConfirm) {
          $.ajax({
            url: '/transaksi/pembelian/{{$modal->id}}',
            method: 'POST',
            data: {
              '_method': 'DELETE'
            },
            success: function(result) {
              console.log('result: ', result)
              swal({
                title:"Deleted!",
                text: "Data berhasil dihapus.",
                type: "success"
              },
              function() {
                window.location = '/laporan/pembelian';
              });
            },
            error: function(result) {
              swal("Gagal!", "Data gagal dihapus.", "error");
            }
          });
        }
        return isConfirm
      });
    });

  });
</script>
@endsection