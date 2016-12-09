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
        <h4>Tambah Jenis Barang</h4>
      </div>
      <div class="x_content">
        <form method="post" class="form-horizontal" action="{{ url('jenis') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Barang</label>
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
        <h4>List Jenis Barang</h4>
      </div>
      <div class="x_content">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Nama</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($jenis as $barang)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{$barang->nama}}</td>
              <td class="text-center"><a class="text-danger" href="{{url('jenis/destroy/'.encrypt($barang->id))}}"><i class="fa fa-close"></i></a></td>
            </tr>
            @empty
            <tr>
              <td rowspan="3">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection