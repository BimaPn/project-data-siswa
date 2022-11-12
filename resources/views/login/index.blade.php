@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <main class="form-signin w-100 m-auto">
          {{-- jika telah registrasi,maka munculkan pesan dibawah ini --}}
          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          {{-- jika login gagal --}}
          @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif



            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
            <form action="/login" method="post">
              @csrf
              <div class="form-floating">
                <input type="email" class="form-control @error('email')
                  is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autofocus required >
                <label for="email">Email address</label>
                @error('email')                  
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control @error('password')
                  is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')                  
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
          
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
              <small class="d-block text-center mt-3">Not register ? <a href="/register">register</a> now !</small>
            </form>
          </main>
    </div>
</div>
@endsection