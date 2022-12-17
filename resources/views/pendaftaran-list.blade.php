@extends('templates')

@section('content')
<div class="container mt-5">
  <h2 class="text-center">Data Pendaftaran Donor Darah</h2>
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
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pendonor as $p)
            @foreach ($pendaftaran as $pr)  
              @if ($p->id == $pr->id_pendonor)
                <tr>
                  <th><?= $p->nama ?></th>
                  <th>{{$p->jenis_kelamin}}</th>
                  <th>{{$p->alamat}}</th>
                  <th>{{$p->tanggal_lahir}}</th>
                  <th>
                    @if ($pr->status == 1)
                      Tidak Bisa Mendonor
                    @elseif ($pr->status == 2)
                      Ke tehap pemeriksaan kesehatan
                    @elseif ($pr->status == 3)
                      Tidak lolos tes kesehatan
                    @elseif ($pr->status == 4)
                      Boleh Donor Darah
                    @endif
                  </th>
                  <th><a href="{{route('pendaftaran.form-kesehatan', $p->id)}}">Detail</a></th>
                </tr>
              @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection