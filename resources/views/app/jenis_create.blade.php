@extends('app')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="box">
      <div class="box-header">
        <h4>Tambah Jenis Barang</h4>
      </div>
      <div class="box-body">
        <form method="post" class="form-horizontal" action="{{ url('jenis') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Harga Barang</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="harga" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="box">
      <div class="box-header">
        <h4>List Jenis Barang</h4>
      </div>
      <div class="box-body">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center col-sm-2">No</th>
              <th>Nama</th>
              <th class="text-right">Harga Jual</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($jenis as $barang)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{$barang->nama}}</td>
              <td class="text-right"><a href="{{url("jenis/$barang->id")}}">{{$barang->latest_kurs->harga}}</a></td>
              <td class="text-center">
                <a class="text-danger delete-resource" data-id="{{encrypt($barang->id)}}"><i class="fa fa-close"></i></a>
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
      url: $('meta[name="base_url"]').attr('content') + '/jenis/' + id,
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