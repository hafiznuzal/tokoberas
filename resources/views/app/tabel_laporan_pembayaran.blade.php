@extends('app')

@include('plugins.datatable')

@section('css')


<link href=" {{ url('bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href=" {{ url('bower_components/AdminLTE/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
<link href=" {{ url('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="box">
    <div class="box-header box-body">
      <h2>Laporan Pembayaran</h2>  
    </div>
    <div class="box box-primary">
    <div class="box-header">
      <div class="form-group">
        <label>Date range:</label>

        <div class="input-group col-md-4">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="reservation">
        </div>
        <!-- /.input group -->
      </div>
    <!-- </div> -->
    <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>No Nota</th>
          <th>Nama Pemesan</th>
          <th>Besar Pembayaran</th>
          <th>Tanggal Pembayaran</th>                    
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  </div>
</div>
</div>

@endsection

@section('js')

@endsection    