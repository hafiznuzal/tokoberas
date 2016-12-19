@extends('app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h4>{{$jenis->nama}}</h4>
      </div>
      <div class="box-body">
        <form method="POST" class="form-horizontal" action="{{ url("jenis/$jenis->id") }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
            <label class="col-sm-3 control-label">Ubah Harga Barang</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="harga" placeholder="" value="{{$jenis->latest_kurs->harga}}">
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
        <h4>History Harga Jual Barang</h4>
      </div>
      <div class="box-body">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center col-sm-2">No</th>
              <th>Tanggal</th>
              <th class="text-right">Harga Jual</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($kurs as $kur)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{$kur->tanggal}}</td>
              <td class="text-right">{{$kur->harga}}</td>
              <td class="text-center">
                <a class="text-danger delete-resource" data-id="{{encrypt($kur->id)}}"><i class="fa fa-close"></i></a>
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
})
</script>
@endsection