@extends('dashboard.layouts.mainDashboard')
@section('admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->name }}</h1>
    </div>
    <a href="" class="btn btn-group-lg"><span data-feather="file-plus"></span> Tambah Postingan</a>
@endsection
