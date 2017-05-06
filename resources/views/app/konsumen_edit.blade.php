@extends('app')

@include('plugins.datepicker')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4>Edit Data Konsumen</h4>
      </div>
      <div class="box-body">
        <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="/konsumen/{{$konsumen->id}}">
          {{ method_field('PUT') }}
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3">Nama Restoran <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="nama_restoran" required="required" class="form-control col-md-7" value="{{$konsumen->nama_restoran}}">
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
            <label class="control-label col-md-3 col-sm-3">Telepon Restoran
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="number" name="telepon_restoran" class="form-control col-md-7" value="{{$konsumen->telepon_restoran}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3">Nama CP <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="nama_cp" required="required" class="form-control col-md-7" value="{{$konsumen->nama_cp}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3">Telepon CP <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="number" name="telepon_cp" required="required" class="form-control col-md-7" value="{{$konsumen->telepon_cp}}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-md-offset-3">
              <a href="{{url('konsumen')}}" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection