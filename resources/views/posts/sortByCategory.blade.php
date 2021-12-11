@extends('template.main')
@section('title', $title)
@section('container')
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mt-3 text-center border">Sort By {{ $sortBy }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($user as $item)
            <div class="col-lg-4 justify-content-lg-center">
                <div class="card text-center">
                    <a href="{{ url('category/'. $item->slug) }}" class="text-decoration-none">
                    <img src="https://source.unsplash.com/1200x400/?{{ $item->name}}" class="card-img-top" alt="{{  $item->name }}">
                    <div class="card-body">
                        <h2>{{ $item->name }}</h2>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
       
    </div>
@endsection