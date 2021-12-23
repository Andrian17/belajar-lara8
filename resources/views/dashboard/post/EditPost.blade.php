@extends('dashboard.layouts.mainDashboard')

@section('admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <a href="" class="btn btn-md btn-dark ms-auto my-3"><span data-feather="file-plus"></span> Tambah Postingan</a>
    </h1>
</div>
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/post/{{ $post->slug }}" >
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Post</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus  
                value="{{  old('judul', $post->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" >
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach ($category as $oko)
                    @if ( old('category_id', $post->category->id) == $oko->id )
                        <option value="{{ $oko->id }}" selected>{{ $oko->name }}</option>
                    @else
                        <option value="{{ $oko->id }}">{{ $oko->name }}</option>
                    @endif
                        
                    @endforeach
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="content" type="hidden" name="content" value="{{ old('content', $post->content) }}">
                <trix-editor input="content"></trix-editor>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    </div>


    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');
        judul.addEventListener('change', function(){
            fetch('/dashboard/post/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function (e){
            e.preventDefault();
        });

    </script>

@endsection