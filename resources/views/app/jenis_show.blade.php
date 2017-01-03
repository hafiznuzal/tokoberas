@extends('app')

@include('plugins.accounting')
@include('plugins.datatable')

@section('content')
<div class="row">
  <div class="col-lg-2 col-sm-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <a href="{{url('jenis')}}" class="btn btn-primary btn-block">Kembali</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-sm-6">
    <div class="box box-primary">
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
    <div class="box box-primary">
      <div class="box-header">
        <h4>History Harga Jual Barang</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover datatabel">
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
</div>
@endsection

@section('js')
<script>
@if (session('edit_success'))
  swal("Success", "Data berhasil diubah", "success");
@endif
</script>
@endsection