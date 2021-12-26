@extends('dashboard.layouts.mainDashboard')

@section('admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <a href="" class="btn btn-md btn-dark ms-auto my-3"><span data-feather="file-plus"></span> Tambah Postingan</a>
    </h1>
</div>
    <div class="col-lg-12">
        <form method="POST" action="/dashboard/category/{{ $categories->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">nama categories</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus  
                value="{{  old('name', $categories->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $categories->slug) }}" >
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- gamabar --}}
                <div class="card mb-3 col-sm-4">
                    @if ($categories->gambar)
                        <img src="{{ asset('storage/' . $categories->gambar) }}" class="card-img-top img-preview" alt="oko">  
                    @else
                        <img src="{{ asset('storage/' . $categories->gambar) }}" class="card-img-top img-preview" alt="...">
                    @endif
                </div>
                <div class="mb-3 col-6">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="formFile" name="gambar" onchange="previewImage()">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
            {{-- okoko --}}           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
        name.addEventListener('change', function(){
            fetch('/dashboard/category/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewImage() {
            const file = document.querySelector('#formFile');
            const imgPrev = document.querySelector('.img-preview');
            imgPrev.style.display = 'block';
            const oFREader = new FileReader();
            oFREader.readAsDataURL(file.files[0]);
            oFREader.onload = function(e) {
                imgPrev.src = e.target.result;
            }
        }
    </script>
@endsection