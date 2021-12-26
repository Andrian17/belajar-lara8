@extends('dashboard.layouts.mainDashboard')
@section('admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->name }}</h1>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-10 mb-4 mt-4">
                <article>
                    <h3 class="text-center text-uppercase">{{ $post->judul }}</h3>
                    @if ($post->gambar)
                        <div class="" style="max-height: 350px; overflow: hidden">
                            <img src="{{ asset('storage/' . $post->gambar) }}" class="card-img-top" alt="...">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400/?{{ $post->category->nama }}" class="card-img-top" alt="...">
                    @endif
                    <div class="my-3">
                        <a href="/dashboard/post" class="btn btn-success"><span data-feather="arrow-left"></span> kembali lihat posts</a>
                        <a class="btn btn-warning" href="#"><span data-feather="edit-3"></span> ubah post</a>
                        <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus postingan..?')"><span data-feather="x-circle"></span> hapus</button>
                        </form>
                    </div>
                    <h5>Created at {{ $post->created_at->diffForHumans() }}</h5>
                    <h5>Category : {{ $post->category->name }}</h5>
                    <p>{!! $post->content !!}</p>
                </article>
            </div>
        </div>
    </div>
@endsection
