<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">PMI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link {{Request::segment(1) == 'kriteria-dilarang' ? 'active' : '' }}" href="{{route('kriteria-dilarang.list')}}">Kriteria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('pendaftaran')}}">Registrasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::segment(2) == 'list' ? 'active' : '' }}" href="{{route('pendaftaran.list')}}">Data Pendaftaran</a>
        </li>
      </ul>
      @if(session()->has('logged'))
      <a href="{{route('logout')}}" class="btn btn-sm btn-success">Logout</a>
      @else 
      <a href="{{route('login')}}" class="btn btn-sm btn-success">Login</a>
      
    @endif
    </div>
  </div>
</nav>