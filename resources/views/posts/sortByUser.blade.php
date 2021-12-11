@extends('template.main')
@section('title', $title)
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2 class="mt-3 text-center border">Sort By {{ $sortBy }} </h2>
                @foreach ($user as $item)
                    <ul>
                        <li class="li">
                          <a href="{{ url('user/'. $item->name) }}">{{ $item->name }}</a>     
                        </li>
                    </ul>
                @endforeach

            </div>
        </div>
    </div>
@endsection