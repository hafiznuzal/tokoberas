@extends('app')


@include('plugins.datatable')
@include('plugins.datepicker')

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
        <h3>Tambah Pengeluaran</h3>  
      </div>
      <div class="box box-primary">
      <div class="box-header with-border">
       
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('pengeluaran')}}">
          {{csrf_field()}}
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Pengeluaran<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control select2" style="width: 100%;" name="jenis">  
                  @foreach ($jenis as $jns)
                  <option value="{{$jns->id}}">{{$jns->nama}}</option>
                  @endforeach   
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Uraian <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="uraian" required="required" class="form-control col-md-7 col-xs-12">
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Pengeluaran <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="biaya" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Penanggung Jawab<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control select2" style="width: 100%;" name="user_id">  
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
      <h3>Laporan Pengeluaran</h3>  
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
   
    <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Tanggal Pengeluaran</th>         
          <th>Jenis Pengeluaran</th>
          <th>Uraian</th>
          <th>Biaya</th>          
          <th>Keterangan</th>                     
        </tr>
      </thead>
      <tbody>
   @foreach($pengeluaran as $klr)
      <tr>
          <td>{{$klr->tanggal}}</td>
          <td>{{$klr->jenis_operasional->nama}}</td>                    
          <td>{{$klr->uraian}}</td>
          <td>{{$klr->biaya}}</td>
          <td><a class="btn btn-primary fa fa-edit" href="{{ url("pengeluaran/$klr->id/edit") }}"></a>
              <a class="btn btn-danger fa fa-trash delete-resource" data-id="{{encrypt($klr->id)}}"></a> </td>            
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