@extends('app')

@include('plugins.datatable')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4>Tambah Produsen</h4>
      </div>
      <div class="box-body">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('produsen')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">Nama <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7">
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
            <label for="middle-name" class="control-label col-md-3 col-sm-3">nomor telepon</label>
            <div class="col-md-6 col-sm-6">
              <input id="middle-name" class="form-control col-md-7" type="number" name="telepon">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3" for="first-name">nomor handphone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              <input type="number" id="first-name" name="hp" required="required" class="form-control col-md-7">
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
    <div class="box box-primary">
      <div class="box-header">
        <h4>Produsen</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="datatable-buttons" class="table table-hover datatabel">
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
              @foreach($produsen as $prod)
              <tr>
                <td>{{$prod->nama}}</td>
                <td>{{$prod->alamat}}</td>
                <td>{{$prod->telepon}}</td>
                <td>{{$prod->hp}}</td>
                <td>
                  <a class="btn btn-primary fa fa-edit" href="{{ url("produsen/$prod->id/edit") }}"></a>
                  <a class="btn btn-danger fa fa-trash delete-resource" data-id="{{encrypt($prod->id)}}"></a>
                </td>
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
      url: $('meta[name="base_url"]').attr('content') + '/produsen/' + id,
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