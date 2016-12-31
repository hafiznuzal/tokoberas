@extends('app')

@include('plugins.datepicker')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box">
      <div class="box-header box-body">
        <h3>Edit Data Konsumen</h3>  
      </div>
      <div class="box box-primary">
      <div class="box-header with-border">
       
        <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url("konsumen/$konsumen->id")}}">
        {{ method_field('PUT') }}
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3">Nama<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="nama" required="required" class="form-control col-md-7" value="{{$konsumen->nama}}">
            </div>
          </div>
          <div class="form-group">
             <label class="col-sm-3 control-label">Tanggal Lahir</label>
             <div class="col-sm-6">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 <input type="text" class="form-control pull-right datepicker" name="tanggal_lahir" value="{{$konsumen->tanggal_lahir}}">
              
                </div>
                  
              </div>
          </div>

         
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="alamat" required="required" class="form-control col-md-7" value="{{$konsumen->alamat}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3">nomor telepon</label>
            <div class="col-md-6 col-sm-6">
              <input class="form-control col-md-7" type="number" name="telepon" value="{{$konsumen->telepon}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3">nomor handphone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="number" name="hp" required="required" class="form-control col-md-7" value="{{$konsumen->hp}}">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-md-offset-3">
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