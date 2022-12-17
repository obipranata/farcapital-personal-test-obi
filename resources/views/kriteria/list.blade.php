@extends('templates')

@section('content')
<div class="container mt-5">
  <a href="{{route('kriteria-dilarang.store')}}" class="btn btn-success mb-3">Tambah Kriteria</a>
  <h2 class="text-center">Data Kriteria</h2>
  @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert" style="width: 60%">
      <strong>{{ $message }}</strong>
    </div>
  @endif
    <div class="row">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kriteria as $k)
            <tr>
              <th>{{$k->nama_kriteria}}</th>
              <th>
                <a class="btn btn-danger btn-sm" href="{{route('kriteria-dilarang.destroy', $k->id)}}">Hapus</a>
              </th>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection