@extends('template.main')
@section('title', $title)
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>{{ $title }} : {{ $post->name }}</h1>
                @foreach ($post->posts as $item)
                    <ul>
                        <li class="li">
                            <h4><a href="{{ url('post/'. $item->slug) }}" class="text-decoration-none">{{ $item->judul }}</a></h4>
                            <small class="text-muted">By <a href="{{ url('user/'. $item->user->name) }}" class="text-decoration-none"> {{ $item->user->name}}</a> ==> in <a href="{{ url('category/'. $item->category->slug) }}" class="text-decoration-none"> {{  $item->category->name }}</a></small >
                            <p>{{ $item->click_bait }}</p>
                           
                        </li>
                    </ul>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
