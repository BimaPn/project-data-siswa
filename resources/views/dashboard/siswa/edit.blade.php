@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Siswa</h1>
  </div>
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="/dashboard/siswa/{{ $siswa->id }}" method="post" class="mb-5" enctype="multipart/form-data">
                @method("put")
                @csrf
                <input type="hidden" name="prevurl" value="{{ $prevurl }}">
                {{-- foto profil --}}
                <div class="mb-3 text-center">
                    <img src="{{ asset('storage/'.$siswa->foto_profil) }}" class="image-preview img-fluid mb-3 col-sm-5">
                    <label for="image" class="form-label d-block">Foto Profil</label>
                    <input class="form-control" type="file" id="image" name="foto_profil" onchange="imagePreview()">
                  </div>
            
                  {{-- nama --}}
                <div class="mb-3">
                  <label for="nama" class="form-label">nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama',$siswa->nama) }}" autofocus>
                  @error('nama')  
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror    
                </div>
            
                {{-- kelas --}}
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-select" aria-label="Default select example" name="kelas_id" id="kelas">
                      @foreach ($kelas as $kls)
                      @if ($siswa->kelas_id == $kls->id)                    
                      <option value="{{ $kls->id }}" selected>{{ $kls->kelas }}</option>
                      @else
                      <option value="{{ $kls->id }}">{{ $kls->kelas }}</option> 
                      @endif                    
                      @endforeach
                    </select>
                  </div>
            
                  {{-- jurusan --}}
                  <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-select" aria-label="Default select example" name="jurusan_id" id="jurusan">
                      @foreach ($jurusan as $jrsn)
                      @if ($siswa->jurusan_id == $jrsn->id)                    
                      <option value="{{ $jrsn->id }}" selected>{{ $jrsn->nama }}</option>
                      @else
                      <option value="{{ $jrsn->id }}">{{ $jrsn->nama }}</option> 
                      @endif                    
                      @endforeach
                    </select>
                  </div>
            
                <button type="submit" class="btn btn-secondary" style="width: 100%">Submit</button>
              </form>
        </div>
    </div>
  </div>
    
  </main>

  <script>
    function imagePreview(){
          const preview = document.querySelector('.image-preview');
          const image = document.querySelector('#image');

          preview.style.display = 'block';

          const blob = URL.createObjectURL(image.files[0]);
          preview.src = blob;
        }
  </script>
@endsection

