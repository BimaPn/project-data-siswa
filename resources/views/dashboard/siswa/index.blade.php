@extends('dashboard.layouts.main')

@section('container')
<style>

</style>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Semua Data Siswa</h1>
    </div>

    {{-- searching --}}
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mt-5 mb-3">
          <h1 class="h1 pb-3">SEARCHING</h1>
          <form action="/dashboard/siswa" method="get">
          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari Siswa ..." name="search">
              <button class="btn btn-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
          </form>
          <h6>OR</h6>
          <a href="/dashboard/siswa/create" class="btn btn-secondary mt-2"><span data-feather="user" class="align-text-bottom"></span> Tambah Siswa</a>
        </div>
      </div>
    </div>
    {{-- list of students --}}
    <div class="container mt-2 mb-5">
      <div class="row text-center ">
          <div class="col-sm-15 mx-auto d-flex flex-wrap justify-content-evenly wrap-card">
            {{-- jika siswa ada,tampilkan datanya --}}
            @if ($siswa->count())                
            @foreach ($siswa as $student)                
            {{-- card --}}
            <div class="card-profile mt-3">
              <div class="card-image">
                <img src="{{ asset('storage/'.$student->foto_profil) }}" alt="gambar">
              </div>
              <div class="card-detail">
                <p><strong>ID</strong>    : <i>{{ $student->id }}</i></p>
                <p><strong>Nama</strong>    : <i>{{ $student->nama }}</i></p>
                <p><strong>Kelas</strong>   : <i>{{ $student->kelas->kelas }}</i></p>
                <p><strong>Jurusan</strong> : <i>{{ $student->jurusan->nama }}</i></p>
                <div class="card-action">
                  <a href="/dashboard/siswa/{{ $student->id }}/edit" class="button-action button-edit">Edit</a>
                  {{-- <form action="/dashboard/siswa/{{ $student->id }}" method="post">
                    @method('delete')
                    @csrf --}}
                    <button type="submit" class="button-delete button-action button-delete" data-id="{{ $student->id }}">Hapus</button>
                  {{-- </form> --}}
                </div>
              </div>
            </div>
            @endforeach

            {{-- jika tidak ada tampilkan not found --}}
            @else
            <h1>Siswa Tidak Ditemukan :(</h1>
            @endif
          </div>
      </div>
      </div>
      <div>
        {{ $siswa->links() }}
      </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajaxDelete.js') }}"></script>
@endsection