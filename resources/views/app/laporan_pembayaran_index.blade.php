@extends('app')

@include('plugins.accounting')
@include('plugins.datatable')
@include('plugins.datepicker')
@include('plugins.daterangepicker')
@include('plugins.selectize')

@section('css')
<link href="{{ url('bower_components/AdminLTE/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4>Tambah Pembayaran</h4>
      </div>
      <div class="box-body">
        <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('pembayaran')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3">
              Nota<span class="required">*</span>
            </label>
            <div class="col-md-6">
              <select id="pilihnota" name="nota_id" placeholder="Pilih nota penjualan">
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">
              Tanggal Pembayaran<span class="required">*</span>
            </label>
            <div class="col-md-6">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control pull-right datepicker" name="tanggal" value="{{date('Y-m-d')}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">
              Jumlah Pembayaran <span class="required">*</span>
            </label>
            <div class="col-md-6">
              <input type="text" name="biaya" required="required" class="form-control col-md-7 input-accounting">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Penerima Pembayaran</label>
            <div class="col-md-6">
              <select class="form-control" name="user_id">
                @foreach ($user as $users)
                <option value="{{$users->id}}">{{$users->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4>Laporan Pembayaran</h4>
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
        <table id="datatable-buttons" class="table datatabel">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">No Nota</th>
              <th>Nama Pemesan</th>
              <th class="text-center">Tanggal Pembayaran</th>
              <th class="text-right">Besar Pembayaran</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @if (count($pembayaran) <= 0)
            <tr>
              <td colspan="5">Tidak ada data</td>
            </tr>
            @endif
            @foreach($pembayaran as $bayar)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td class="text-center">{{$bayar->nota_id}}</td>
              <td>{{$bayar->konsumen->nama}}</td>
              <td class="text-center">{{$bayar->tanggal}}</td>
              <td class="text-right">{{number_format($bayar->biaya)}}</td>
              <td>
                <a class="btn btn-primary fa fa-edit" href="{{ url("pengeluaran/$bayar->id/edit") }}"></a>
                <a class="btn btn-danger fa fa-trash delete-resource" data-id="{{encrypt($bayar->id)}}"></a>
              </td>
            </tr>
            @endforeach
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

  inventory = $("#pilihnota").selectize({
    valueField: 'id',
    labelField: 'id',
    searchField: ['tanggal', 'total_harga'],
    create: false,
    options: {!!json_encode($dotnota)!!},
    render: {
      option: function(item, escape) {
        return '<div>' +
          '<div class="row small">' +
            '<div class="col-sm-6">' +
              '<span><strong>No. Nota: </strong>' + escape(item.id) + '</span><br>' +
              '<span><strong>Tanggal: </strong>' + escape(item.tanggal) + '</span><br>' +
              '<span><strong>Konsumen: </strong>' + escape(item['konsumen.nama']) + '</span>' +
            '</div>' +
            '<div class="col-sm-6">' +
              '<span><strong>Harga Total: </strong>' + accounting(item.total_harga) + '</span><br>' +
              '<span><strong>Pembayaran: </strong>' + accounting(item.total_pembayaran) + '</span><br>' +
              '<span><strong>Kurang: </strong>' + accounting((item.total_harga - item.total_pembayaran)) + '</span>' +
            '</div>' +
          '</div>' +
        '</div>';
      },
      item: function(item, escape) {
        return '<div><span>Nota no. ' + item.id + '</span> &nbsp; <small class="text-muted">' + item.tanggal + '</small></div>';
      }
    },
  })[0].selectize;
})

@if (session('tambah_success'))
  swal("Success", "Data berhasil ditambah", "success");
@endif
@if (session('edit_success'))
  swal("Success", "Data berhasil diubah", "success");
@endif
</script>
@endsection
