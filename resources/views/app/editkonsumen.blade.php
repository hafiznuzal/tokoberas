@extends('app')

@include('plugins.editdata')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box">
      <div class="box-header box-body">
        <h3>Edit Data Konsumen</h3>  
      </div>
      <div class="box box-primary">
      <div class="box-header with-border">
       
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url("konsumen/$konsumen->id")}}">
        {{ method_field('PUT') }}
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="{{$konsumen->nama}}">
            </div>
          </div>


          <div class="form-group">
             <label class="col-sm-3 control-label">Tanggal Lahir</label>
             <div class="col-sm-6">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 <input type="text" class="form-control pull-right datepicker" name="tanggallahir" value="{{$konsumen->tanggallahir}}">
              
                </div>
                  
              </div>
          </div>

         
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="alamat" required="required" class="form-control col-md-7 col-xs-12" value="{{$konsumen->alamat}}">
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">nomor telepon</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="telepon" value="{{$konsumen->telepon}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">nomor handphone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="first-name" name="hp" required="required" class="form-control col-md-7 col-xs-12" value="{{$konsumen->hp}}">
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
@endsection
@section('js')

@endsection    