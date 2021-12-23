@extends('dashboard.layouts.mainDashboard')
@section('admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->name }}</h1>
    </div>
    <div class="table-responsive">
      <a href="/dashboard/post/create" class="btn btn-md btn-dark ms-auto my-3"><span data-feather="file-plus"></span> Tambah Postingan</a>
      @if (session()->has('pesan'))
          {!! session('pesan') !!}
      @endif
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul</th>
              <th scope="col">Category</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($posts as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a class="badge bg-info" href="/dashboard/post/{{ $item->slug }}"><span data-feather="eye"></span></a>
                        <a class="badge bg-warning" href="/dashboard/post/{{ $item->slug }}/edit"><span data-feather="edit-3"></span></a>
                        <form action="/dashboard/post/{{ $item->slug }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                              <button class="border-0 badge bg-danger" type="submit" onclick="return confirm('hapus postingan..??')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr>
              @endforeach
            
          </tbody>
        </table>
      </div>
@endsection
