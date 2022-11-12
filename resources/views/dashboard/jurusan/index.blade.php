@extends('dashboard.layouts.main')

@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Pilih Kelas
      </h1>
    </div>

    <div class="container mt-5">
    <div class="row text-center ">
        <div class="col-sm-9 mx-auto d-flex flex-wrap justify-content-center">
          @foreach ($jurusan as $o)
          <a href="/dashboard/jurusan/{{ $o->slug }}" class="btn btn-secondary mx-3 mb-5 d-flex align-items-center justify-content-center fs-1 fw-bold" style="aspect-ratio : 1 / 1;width: 30%;">{{ $o->nama }}</a>
          @endforeach
        </div>
    </div>
    </div>
  </main>
@endsection