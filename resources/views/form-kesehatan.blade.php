@extends('templates')

@section('content')
<div class="container mt-5">
  @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert" style="width: 60%">
      <strong>{{ $message }}</strong>
    </div>
  @endif

  <div class="card" style="width: 60%">
    <h5 class="card-header">Pendonor</h5>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item">Nama : {{$pendonor->nama}}</li>
        <li class="list-group-item">Jenis Kelamin : {{$pendonor->janis_kelamin}}</li>
        <li class="list-group-item">Tanggal Lahir : {{$pendonor->tanggal_lahir}}</li>
        <li class="list-group-item">Alamat : {{$pendonor->alamat}}</li>
        <li class="list-group-item">Ket :                     
            @if ($pendaftaran->status == 1)
            Tidak Bisa Mendonor
            @elseif ($pendaftaran->status == 2)
              Ke tehap pemeriksaan kesehatan
            @elseif ($pendaftaran->status == 3)
              Tidak lolos tes kesehatan
            @elseif ($pendaftaran->status == 4)
              Boleh Donor Darah
            @endif
        </li>
      </ul>
    </div>
  </div>

  <form method="post" action="{{route('pendaftaran.update', $pendonor->id)}}">
    @csrf
    @method('put')
    <table class="table table-bordered table-striped mt-5 ">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <th>Usia 17 - 60 Tahun</th>
            <th class="text-center">
              <input type="checkbox" id="id" name="kriteria[]" value="">
            </th>
          </tr>
          <tr>
            <th>Berat Badan >= 45 Kg</th>
            <th class="text-center">
              <input type="checkbox" id="id" name="kriteria[]" value="">
            </th>
          </tr>
          <tr>
            <th>Temperatur tubuh 36,6 - 37,5 derajat
              Celcius</th>
            <th class="text-center">
              <input type="checkbox" id="id" name="kriteria[]" value="">
            </th>
          </tr>
          <tr>
            <th>
              Tekanan darah sistole =
110-160 mmHg, diastole = 70-100 mmHg
            </th>
            <th class="text-center">
              <input type="checkbox" id="id" name="kriteria[]" value="">
            </th>
          </tr>
          <tr>
            <th>
              Denyut nadi teratur yaitu sekitar 50-100
              kali/menit
            </th>
            <th class="text-center">
              <input type="checkbox" id="id" name="kriteria[]" value="">
            </th>
          </tr>
          <tr>
            <th>
              Hemoglobin perempuan minimal 12
              gram, sedangkan untuk laki-laki minimal
              12,5 gram
            </th>
            <th class="text-center">
              <input type="checkbox" id="id" name="kriteria[]" value="">
            </th>
          </tr>
      </tbody>
    </table>

    <button type="submit" class="btn btn-primary mb-5">Simpan</button>

  </form>

</div>
@endsection