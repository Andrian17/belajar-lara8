@extends('template.main')
@section('title', 'Tentang Saya')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Nama Saya {{ $nama }}</h2>
                <h5>Hobi Saya {{ $hobi }}</h5>
            </div>
        </div>
    </div>
@endsection