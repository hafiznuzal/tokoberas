@extends('app')

@include('plugins.editdata')

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
              <select class="form-control select2" style="width: 100%;" name="jenis" value="{{$pengeluaran->jenis_operasional->nama}}">  
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
              <input type="text" id="last-name" name="uraian" required="required" class="form-control col-md-7 col-xs-12" value="{{$pengeluaran->uraian}}">
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Pengeluaran<span class="required">*</span>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Pengeluaran <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="biaya" required="required" class="form-control col-md-7 col-xs-12" value="{{$pengeluaran->biaya}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Penanggung Jawab<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control select2" style="width: 100%;" name="user_id" value="{{$pengeluaran->user_id->nama}}">  
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

@endsection
@section('js')

@endsection    