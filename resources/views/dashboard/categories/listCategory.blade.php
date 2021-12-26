@extends('dashboard.layouts.mainDashboard')

@section('admin')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <a href="/dashboard/category/create" class="btn btn-md btn-dark ms-auto my-3"><span data-feather="file-plus"></span> Tambah Category</a>
    </h1>
</div>

    @if (session()->has('pesan'))
        {!! session('pesan') !!}
    @endif

@foreach ($category as $item)
    <div class="col-lg-8 my-4">
        <div class="list-group">
            <div class="list-group-item list-group-item-action active">
                <div class="d-flex w-100 justify-content-start">
                    <h5 class="mb-1">{{ $item->name }}</h5>
                    <form  action="/dashboard/category/{{ $item->slug }}" method="POST" class="d-inline ms-4 me-1">
                        @method('delete')
                          @csrf
                        <button type="submit" class="border-0 badge bg-danger"><span data-feather="x-circle"></span> delete</button>
                    </form>
                    <a href="/dashboard/category/{{ $item->slug }}/edit" class="border-0 badge bg-info d-inline-flex"><span data-feather="edit-3"></span> edit</a>
                </div>
                <p class="mb-1">{{ $item->slug }}</p>
                <small>Created at {{ $item->created_at }}</small>
            </div>
        </div>
    </div>
@endforeach

@endsection