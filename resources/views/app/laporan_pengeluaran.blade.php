@extends('app')

@include('plugins.datatable')
@include('plugins.daterangepicker')
@include('plugins.datepicker')
@include('plugins.accounting')
@include('plugins.select2')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4>Tambah Pengeluaran</h4>
      </div>
      <div class="box-body">

        <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('pengeluaran')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Jenis Pengeluaran <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <select class="form-control select2" name="jenis">
                @foreach ($jenis as $jns)
                <option value="{{$jns->id}}">{{$jns->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="last-name">Uraian <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="uraian" required="required" class="form-control col-md-7">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Pengeluaran <span class="required">*</span></label>
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="tanggal" placeholder="2016-02-21">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="last-name">Jumlah Pengeluaran <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="biaya" required="required" class="form-control col-md-7 input-accounting">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Penanggung Jawab <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <select class="form-control select2" name="user_id">
                @foreach ($user as $users)
                <option value="{{$users->id}}">{{$users->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-md-offset-3">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4>Laporan Pengeluaran</h4>
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
        <table id="datatable-buttons" class="table table-hover datatabel">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Tanggal Pengeluaran</th>
              <th>Jenis Pengeluaran</th>
              <th>Uraian</th>
              <th class="text-right">Biaya</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pengeluaran as $klr)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{date('Y-m-d', strtotime($klr->tanggal))}}</td>
              <td>{{$klr->jenis_operasional->nama}}</td>
              <td>{{$klr->uraian}}</td>
              <td class="text-right">{{number_format($klr->biaya)}}</td>
              <td>
                <a class="btn btn-primary fa fa-edit" href="{{ url("pengeluaran/$klr->id/edit") }}"></a>
                <a class="btn btn-danger fa fa-trash delete-resource" data-id="{{encrypt($klr->id)}}"></a>
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
  $(function() {
    $('#daterange').daterangepicker({
      format: 'YYYY-MM-DD'
    }, function(start, end) {
      $('#rangestart').val(start.format('YYYY-MM-DD'));
      $('#rangeend').val(end.format('YYYY-MM-DD'));
      $("#formrange").submit()
    });
  })
</script>
@endsection