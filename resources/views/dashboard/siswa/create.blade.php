@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Siswa Baru</h1>
  </div>
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
          {{-- jangan lupa,jika ingin mengirim file di form, harus sertakan juga enctype="multipart/form-data" --}}
            <form action="/dashboard/siswa" method="post" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <img class="image-preview img-fluid mb-3 col-sm-5">
                    <label for="image" class="form-label">Foto Profil *optional</label>
                    <input class="form-control" type="file" id="image" name="foto_profil" onchange="imagePreview()">
                  </div>
    
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" autofocus>
                    @error('nama')  
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror    
                  </div>
    
                <div class="mb-3">
                  <label for="kelas" class="form-label">Kelas</label>
                  <select class="form-select" aria-label="Default select example" name="kelas_id" id="kelas">
                    @foreach ($kelas as $kls)
                    @if (old('kelas_id') == $kls->id)                    
                    <option value="{{ $kls->id }}" selected>{{ $kls->kelas }}</option>
                    @else
                    <option value="{{ $kls->id }}">{{ $kls->kelas }}</option> 
                    @endif                    
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="jurusan" class="form-label">Jurusan</label>
                  <select class="form-select" aria-label="Default select example" name="jurusan_id" id="jurusan">
                    @foreach ($jurusan as $jrsn)
                    @if (old('jurusan_id') == $jrsn->id)                    
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

  {{-- script untuk meng handle auto fill slug --}}
  <script>
        // cara pertama menggunakan eloquent sluggable(liat aja di video sandika atau liat di google)
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");
 
        title.addEventListener("change", function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
        });

        // cara kedua (cara simple)
        // const title = document.querySelector("#title");
        // const slug = document.querySelector("#slug");

        // title.addEventListener("keyup", function() {
        //     let preslug = title.value;
        //     preslug = preslug.replace(/ /g,"-");
        //     slug.value = preslug.toLowerCase();
        // });

        // untuk mencegah fitur kirim file dibagian create content
        document.addEventListener('trix-file-accept',(e)=>{
            e.preventDefault();
        })

        // untuk menghandle preview gambar

//         const blob = URL.createObjectURL(image.files[0]);
// imgPreview.src = blob;

        function imagePreview(){
          const preview = document.querySelector('.image-preview');
          const image = document.querySelector('#image');

          preview.style.display = 'block';

          const oFreader = new FileReader();
          oFreader.readAsDataURL(image.files[0]);

          oFreader.onload = function (oFREvent){
            preview.src = oFREvent.target.result;
          }
        }

  </script>
@endsection