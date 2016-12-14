@extends('app')

@include('plugins.datatable')

@section('css')
<link href="{{ url('bower_components\AdminLTE\plugins\datatables\extensions\Responsive\css\dataTables.responsive.css') }}" rel="stylesheet">
<link href="{{ url('bower_components\AdminLTE\plugins\datatables\jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4>Tambah Karyawan</h4>
      </div>
      <div class="box-body">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('users')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Nama <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="nama" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Tanggal lahir <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control pull-right" name="tanggallahir">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="last-name">Tempat lahir <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="tempatlahir" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="last-name">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="alamat" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3">Nomor Telepon</label>
            <div class="col-md-6 col-sm-6">
              <input class="form-control col-md-7" type="text" name="telepon">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Handphone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="hp" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Jabatan <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="jabatan" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Username <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="username" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="password" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-sm-offset-3">
              <button type="submit" class="btn btn-primary">Cancel</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="box box-primary">
          <div class="box-header">
            <h4>Karyawan</h4>
          </div>
          <div class="box-body">
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
                  <td>Keterangan</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection