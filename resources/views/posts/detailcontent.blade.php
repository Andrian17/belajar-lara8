@extends('template.main')
@section('title', $title)
@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-4 mt-4">
                <article>
                    <h2 class="text-center my-4">{{ $post->judul }}</h2>
                    @if ($post->gambar)
                        <div class="border border-danger my-2" style="max-height:350px; overflow:hidden">
                            <img src="{{ asset('storage/' . $post->gambar) }}" class="card-img-top" alt="...">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400/?{{ $post->category->nama }}" class="card-img-top my-2" alt="...">
                    @endif
                    <p>{{ $post->created_at }}</p>
                    <span>Post By <a href="{{ url('user/'. $post->user->name) }}">{{ $post->user->name }}</a> ==> Category : </span><a href="{{ url('category/'. $post->category->slug) }}">{{ $post->category->name }}</a>
                    <p>{!! $post->content !!}</p>
                </article>
               
            </div>
        </div>
    </div>
@endsection
