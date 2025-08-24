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
                            <form action="{{ route('update-product', $data_product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Masukan name news" name="name"
                                        value="{{ $data_product->name }}">
                                    @error('name')
                                        <div class=" invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="category_id" id="kategori"
                                        class="form-control @error('category_id')
                                        is-invalid
                                    @enderror">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $data_product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number"
                                        class="form-control @error('price')
                                        is-invalid
                                    @enderror"
                                        id="price" placeholder="Masukan price" name="price"
                                        value="{{ $data_product->price }}">
                                    @error('price')
                                        <div class=" invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="hidden"
                                        class="form-control @error('deskripsi')
                                        is-invalid
                                    @enderror"
                                        id="deskripsi" placeholder="Masukan deskripsi" name="description"
                                        value="{{ $data_product->description }}">
                                    <trix-editor input="deskripsi"></trix-editor>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" form-group">
                                    <label for="image">Image Product</label>
                                    <input type="hidden" id="imageLama" name="imageLama"
                                        value="{{ $data_product->image_product }}">
                                    @if ($data_product->image_product)
                                        <img src="{{ asset('storage/' . $data_product->image_product) }}"
                                            class="d-block mb-3 img-fluid col-sm-3 p-0">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-3">
                                    @endif
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image_product')
                                            is-invalid
                                        @enderror"
                                            id="image" onchange="previewImage()" name="image_product">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    @error('image_product')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('product-home') }}" class="btn btn-info">Kembali</a>
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
