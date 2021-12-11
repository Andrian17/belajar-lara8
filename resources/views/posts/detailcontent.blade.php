@extends('template.main')
@section('title', $title)
@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-4 mt-4">
                <article>
                    <h5>{{ $post->judul }}</h5>
                    <p>{{ $post->created_at }}</p>
                    <span>Post By <a href="{{ url('user/'. $post->user->name) }}">{{ $post->user->name }}</a> ==> Category : </span><a href="{{ url('category/'. $post->category->slug) }}">{{ $post->category->name }}</a>
                    <p>{{ $post->content }}</p>

                </article>
               
            </div>
        </div>
    </div>
@endsection