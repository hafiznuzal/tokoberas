@extends('app')

@include('plugins.datatable')
@include('plugins.datepicker')
@section('css')
<link href=" {{ url('bower_components\AdminLTE\plugins\datatables\extensions\Responsive\css\dataTables.responsive.css') }}" rel="stylesheet">
<link href=" {{ url('bower_components\AdminLTE\plugins\datatables\jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3>Tambah Karyawan</h3>
      </div>
      <div class="box-body">
        <br />

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('users')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Nama<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
             <label class="col-sm-3 control-label">Tanggal Lahir</label>
             <div class="col-sm-6">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="tanggallahir">
                </div>
                  
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="last-name">Tempat Lahir<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" id="last-name" name="tempatlahir" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="last-name">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" id="last-name" name="alamat" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Nomor Handphone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" id="first-name" name="hp" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Jabatan<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" id="first-name" name="jabatan" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Username <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" id="first-name" name="username" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Password<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="password" id="first-name" name="password" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Confirm Password<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="password" id="first-name" name="confirmpassword" required="required" class="form-control col-md-7">
            </div>
          </div>
          <div class="ln_solid"></div>
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
          <div class="box-header with-border">
            <h3>Karyawan</h3>
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
</div>
@endsection

@section('js')

<script>
$(function() {
  $(".delete-resource").click(function() {
    id = $(this).data('id');
    $.ajax({
      url: $('meta[name="base_url"]').attr('content') + '/users/' + id,
      method: 'POST',
      data: {
        '_method': 'DELETE'
      },
      success: function(result) {
        // console.log(result)
        window.location = window.location
      }
    })
  })
})
</script>

@endsection
