@extends('app')

@include('plugins.datatable')
@include('plugins.daterangepicker')

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h4>Laporan Pembelian</h4>
  </div>
  <div class="box-body">
    <div class="form-group">
      <label class="">Date range:</label>
      <div class="input-group col-md-4 ">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" id="daterange">
      </div>
    </div>
    <form id="formrange">
      <input type="hidden" id="rangestart" name="start">
      <input type="hidden" id="rangeend" name="end">
    </form>
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
            @if (Auth::user()->jabatan == 'admin')
            <button class="btn btn-danger btn-sm delete-resource" data-id="{{$beli->id}}"><i class="fa fa-trash"></i> Delete</button>
            @endif
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
<script>
$(function() {
  $('#daterange').daterangepicker({
    format: 'YYYY-MM-DD',
    locale: {
      format: 'YYYY-MM-DD'
    },
    startDate: '{{$start}}',
    endDate: '{{$end}}'
  }, function(start, end) {
    $('#rangestart').val(start.format('YYYY-MM-DD'));
    $('#rangeend').val(end.format('YYYY-MM-DD'));
    $("#formrange").submit()
  });

  $(".delete-resource").click(function() {
    id = $(this).data('id');

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
          url: '/transaksi/pembelian/' + id,
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
})
</script>
@endsection