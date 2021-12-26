@extends('dashboard.layouts.mainDashboard')

@section('admin')

    <div class="col-lg-8 justify-content-center pt-3 pb-2 mb-3 border-bottom">
        <div class="ms-auto my-3 text-dark fs-5 text-center"><span data-feather="file-plus"></span> Tambah Category</div>
    </div>
    <div class="col-lg-8 my-4">
        <form method="POST" action="/dashboard/category" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Category</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus  
                value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar</label>
                <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-7">
                <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="formFile" name="gambar" onchange="previewImage()">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
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