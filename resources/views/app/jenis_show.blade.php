@extends('app')

@include('plugins.accounting')

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
            <label class="col-sm-4 control-label">Ubah Harga Barang</label>
            <div class="col-sm-7">
              <input type="text" class="form-control input-accounting" name="harga" placeholder="" value="{{number_format($jenis->latest_kurs->harga)}}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-4">
              <button type="submit" class="btn btn-success">Submit</button>
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
            </tr>
          </thead>
          <tbody>
            @forelse ($kurs as $kur)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td>{{$kur->tanggal}}</td>
              <td class="text-right">{{number_format($kur->harga)}}</td>
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