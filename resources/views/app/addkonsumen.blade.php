@extends('app')

@include('plugins.datatable')
@include('plugins.datepicker')

@section('css')
<link href=" {{ url('bower_components\AdminLTE\plugins\datatables\extensions\Responsive\css\dataTables.responsive.css') }}" rel="stylesheet">
<link href=" {{ url('bower_components\AdminLTE\plugins\datatables\jquery.dataTables.min.css') }}" rel="stylesheet">


@endsection


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box">
      <div class="box-header box-body">
        <h3>Tambah Konsumen</h3>  
      </div>
      <div class="box box-primary">
      <div class="box-header with-border">
       
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('konsumen')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
             <label class="col-sm-3 control-label">Tanggal Lahir</label>
             <div class="col-sm-6">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="tanggallahir" placeholder="1995-02-19">
                </div>
                  
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
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">nomor telepon</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="telepon">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">nomor handphone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="first-name" name="hp" required="required" class="form-control col-md-7 col-xs-12">
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
      <h3>Data Konsumen</h3>      
      </div>
    <div class="box box-primary">
    <div class="box-header">      
      <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No Telepon</th>
              <th>No Handphone</th>
              <th>Aksi</th>                     
            </tr>
          </thead>


          <tbody>
          @foreach($konsumen as $kons)
            <tr>
              <td>{{$kons->nama}}</td>
              <td>{{$kons->alamat}}</td>
              <td>{{$kons->telepon}}</td>
              <th>{{$kons->hp}}</th>
              <th> <a class="btn btn-primary fa fa-edit" href="{{ url("konsumen/$kons->id/edit") }}"></a>
                  <a class="btn btn-danger fa fa-trash delete-resource" data-id="{{encrypt($kons->id)}}"></a> </th>
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
<script>
$(function() {
  $(".delete-resource").click(function() {
    id = $(this).data('id');
    $.ajax({
      url: $('meta[name="base_url"]').attr('content') + '/konsumen/' + id,
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