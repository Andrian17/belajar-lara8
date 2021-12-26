@extends('template.main')
@section('title',  $title )
@section('container')
    <div class="container-lg">
        <div class="row justify-content-lg-center">
            <div class="col-md-8">
                <form action="{{ url('/post') }}" method="get">
                    
                    <div class="input-group my-3">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('user'))
                            <input type="hidden" name="user" value="{{ request('user') }}">
                        @endif
                        <input type="text" name="cari" id="cari" class="form-control" placeholder="cari post disini">
                        <button type="submit" class="btn btn-outline-danger" id="button2">
                            Cari
                        </button>

                    </div>
                </form>
            </div>
        </div>
       @if ($post->count())
    <div class="row">
        <div class="col-lg-12">
        <h2 class="mt-3 text-center border">{{ $jenisPost }}</h2>
            <div class="card mb-3 text-center">
                @if ($post[0]->gambar)
                    <div class="border border-danger" style="max-height:350px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post[0]->gambar) }}" class="card-img-top" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $post[0]->category->nama }}" class="card-img-top" alt="...">
                @endif
                    
                    <div class="card-body">
                        <a href="{{ url('post/'. $post[0]->slug) }}" class="text-decoration-none">
                            <h5 class="card-title">{{ $post[0]->judul }}</h5>
                        </a>
                        <p>
                            <small class="text-muted">
                                Post By <a href="{{ url('post?user='. $post[0]->user->name ) }}" class="text-decoration-none">{{ $post[0]->user->name }}</a> In <a href="{{ url('post?category='.$post[0]->category->slug) }}" class="text-decoration-none">{{ $post[0]->category->name }} </a>  {{ $post[0]->created_at->diffForHumans()  }} 
                                    {{--//conversi created_at ke waktu*//  --}}
                            </small>
                        </p>
                        <p class="card-text">{{ $post[0]->click_bait }}</p>
                            <a href="{{ url('post/' . $post[0]->slug) }}" class="btn btn-primary">Baca Lanjut</a>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($post->skip(1) as $item)
            <div class="col-lg-4 justify-content-lg-center">
                <div class="card mb-4 p-2">
                    <h6><a href="{{ url('post/' . $item->slug) }}" class="text-decoration-none">{{ $item->judul }}</a></h6>
                    <div class="card-body">
                      <small class="text-muted">
                          By <a href="{{ url('user/' . $item->user->name) }}" class="text-decoration-none">{{ $item->user->name }}</a> In <a href="{{ url('post?category='.$item->category->slug) }}" class="text-decoration-none">{{ $item->category->name }}</a>
                      </small>
                      <p class="card-text">{{ $item->click_bait }}</p>
                      <a href="{{ url('post/'. $item->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                
            </div>
        @endforeach
    </div>
        @else
            <p class="text-center fs-3">Tidak Ada Artikel</p>
        @endif

        <div class="d-flex justify-content-end">
           
            {{ $post->links() }}
            {{-- {{ $post->currentPage() }}
            {{ $post->onEachSide(3) }} --}}
        </div>

         
        

    </div>
@endsection