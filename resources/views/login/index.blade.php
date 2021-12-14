@extends('template.main')
@section('title', $title )
@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <main class="form-signin m-3 text-center">
              @if(session()->has('status'))
              <div class="alert alert-primary" role="alert">
                {{ session('status') }}
              </div>
              @endif
                <h1 class="h3 mb-3 fw-normal">Mohon login</h1>
                <form>
                  <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="d-block mt-3">Belum mendaftar?  <a href="{{ url('/register') }}">Daftar sekarang!</a></small>
              </main>
        </div>
    </div>
</div>

@endsection