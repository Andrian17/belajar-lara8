@extends('template.main')
@section('title', $title)
@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <main class="form-registration m-3 text-center">
             
                <h1 class="h3 mb-3 fw-normal">Form Registrasi</h1>
                <form method="POST" action="{{ url('/register') }}">
                  @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top @error('username') is-invalid @enderror" id="floatingInput" placeholder="username" name="username" value="{{ old('username') }}">
                        <label for="floatingInput">Username</label>
                          @error('username')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                    </div>  
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" value="{{ old('name') }}" placeholder="nama" name="name">
                        <label for="floatingInput">Nama</label>
                          @error('nama')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                    </div>
                    
                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ old('email') }}" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                  </div>
                  <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
                </form>
                <small class="d-block mt-3">Sudah mendaftar?<a href="{{ url('/login') }}">Login sekarang!</a></small>
              </main>
        </div>
    </div>
</div>

@endsection