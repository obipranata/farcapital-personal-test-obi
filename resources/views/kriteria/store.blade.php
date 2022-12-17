@extends('templates')

@section('content')
<div class="container mt-5">
  @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert" style="width: 60%">
      <strong>{{ $message }}</strong>
    </div>
  @endif
  <div class="card" style="width: 60%">
    <h5 class="card-header">Tambah Kriteria Yang Dilarang</h5>
    <div class="card-body">
      <form method="post" action="{{route('kriteria-dilarang.create')}}">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama_kriteria">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection