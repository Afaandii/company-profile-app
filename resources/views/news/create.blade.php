@include('template.header')
@include('template.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 font-weight-bold">{{ $title }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('store-news') }}" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title"
                                        placeholder="Masukan title news" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" placeholder="Masukan slug"
                                        name="slug" readonly value="{{ old('slug') }}">
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="category_id" id="kategori" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <input type="hidden" class="form-control" id="content"
                                        placeholder="Masukan content" name="content" value="{{ old('content') }}">
                                    <trix-editor input="content"></trix-editor>
                                </div>
                                <div class=" form-group">
                                    <label for="image">Image</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image"
                                            onchange="previewImage()" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('role_home') }}" class="btn btn-info">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->
</div>
@include('template.footer')
