@extends('app')

@include('plugins.datatable')

@section('css')
<link href=" {{ url('bower_components\AdminLTE\plugins\datatables\extensions\Responsive\css\dataTables.responsive.css') }}" rel="stylesheet">
<link href=" {{ url('bower_components\AdminLTE\plugins\datatables\jquery.dataTables.min.css') }}" rel="stylesheet">


@endsection


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box">
      <div class="box-header box-body">
        <h2>Tambah Karyawan</h2>
        <div class="box box-primary"></div>
      </div>
      <div class="box-header with-border">
        <br />

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('users')}}">
          {{csrf_field()}}

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal lahir<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control pull-right" name="tanggallahir">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">tempat lahir<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="tempatlahir" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">nomor handphone <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="first-name" name="hp" required="required" class="form-control col-md-7 col-xs-12">
      </div> 
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">jabatan<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="first-name" name="jabatan" required="required" class="form-control col-md-7 col-xs-12">
      </div> 
    </div> 
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">username <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="first-name" name="username" required="required" class="form-control col-md-7 col-xs-12">
      </div>  
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">password<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="first-name" name="password" required="required" class="form-control col-md-7 col-xs-12">
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

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box">
      <div class="box-header box-body">
        <h2>Karyawan</h2>

        <div class="clearfix"></div>
      </div>
      <div class="box box-primary">
        <div class="box-header">

          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>No Handphone</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Keterangan</th>                     
              </tr>
            </thead>


            <tbody>
              @foreach($user as $userdata)
              <tr>
                <td>{{$userdata->nama}}</td>
                <td>{{$userdata->tanggal_lahir}}</td>
                <td>{{$userdata->tempat_lahir}}</td>
                <td>{{$userdata->alamat}}</td>
                <td>{{$userdata->hp}}</td>
                <td>{{$userdata->jabatan}}</td>
                <td>{{$userdata->username}}</td>
                <td><a class="btn btn-primary fa fa-edit" href="{{ url("users/$userdata->id/edit") }}"></a>
                  <a class="btn btn-danger fa fa-trash delete-resource" data-id="{{encrypt($userdata->id)}}"></a> </td>                     
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