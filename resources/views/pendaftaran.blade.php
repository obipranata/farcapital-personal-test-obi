@extends('templates')

@section('content')
<div class="container mt-5">
  @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert" style="width: 60%">
      <strong>{{ $message }}</strong>
    </div>
  @endif
  <form method="post" action="{{route('pendaftaran.create')}}">
    @csrf
  <div class="card" style="width: 60%">
    <h5 class="card-header">Pendaftaran</h5>
    <div class="card-body">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <select class="form-select" name="jenis_kelamin" id="jk">
            <option selected disabled>Pilih</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" placeholder="alamat" id="alamat" name="alamat"></textarea>
        </div>
    </div>
  </div>

  <table class="table table-bordered table-striped mt-5 ">
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
          <th class="text-center">
            <input type="checkbox" id="id" name="id[]" value="{{$k->id}}">
          </th>
        </tr>
        @endforeach
    </tbody>
  </table>

  <button type="submit" class="btn btn-primary mb-5">Simpan</button>

</form>

</div>
@endsection