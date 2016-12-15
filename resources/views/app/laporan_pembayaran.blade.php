@extends('app')

@include('plugins.datatable')

@section('css')
<link href=" {{ url('bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href=" {{ url('bower_components/AdminLTE/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
<link href=" {{ url('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">

<link href=" {{ url('bower_components\AdminLTE\plugins\select2\select2.min.css') }}" rel="stylesheet">
<style>
.select2-selection--single{background-color:#fff;border-radius: 0px !important; box-shadow: none !important; border-color: #d2d6de !important; height: 34px !important;}
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box">
      <div class="box-header box-body">
        <h3>Tambah Pembayaran</h3>  
      </div>
      <div class="box box-primary">
      <div class="box-header with-border">
       
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('konsumen')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nota<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control select2" style="width: 100%;">  
                  @foreach ($nota as $not)
                  <option value="{{$not->id}}">{{$not->id}}</option>
                  @endforeach   
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Pembayaran<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" name="tanggal">
                </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Pembayaran <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="biaya" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Penerima Pembayaran</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control select2" style="width: 100%;">
              @foreach ($user as $users)
                  <option value="{{$users->id}}">{{$users->nama}}</option>
              @endforeach                      
                </select>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-primary">Cancel</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="box">
    <div class="box-header box-body">
      <h3>Laporan Pembayaran</h3>  
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
      @foreach($pembayaran as $bayar)
      <tr>
          <th>No Nota</th>
          <th>Nama Pemesan</th>
          <th>Besar Pembayaran</th>
          <th>Tanggal Pembayaran</th>                    
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  </div>
  </div>
</div>
</div>


@endsection

@section('js')


@endsection    