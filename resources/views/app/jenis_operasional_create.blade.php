@extends('app')

@section('css')
<style type="text/css">
  .form-inline .btn {
    margin-bottom: 0;
  }
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="x_panel">
      <div class="x_title">
        <h4>Tambah Jenis Operasional</h4>
      </div>
      <div class="x_content">
        <form method="post" class="form-horizontal" action="{{ url('jenis_operasional') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Operasional</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-3">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="x_panel">
      <div class="x_title">
        <h4>List Jenis Operasional</h4>
      </div>
      <div class="x_content">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center col-sm-1">No</th>
              <th>Nama</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($jenis as $operasional)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{$operasional->nama}}</td>
              <td class="text-center">
                <a class="text-danger delete-resource" data-id="{{encrypt($operasional->id)}}"><i class="fa fa-close"></i></a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="3">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
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
      url: $('meta[name="base_url"]').attr('content') + '/jenis_operasional/' + id,
      method: 'POST',
      data: {
        '_method': 'DELETE'
      },
      success: function() {
        window.location = window.location
      }
    })
  })
})
</script>
@endsection