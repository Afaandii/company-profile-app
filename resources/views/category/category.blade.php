@include('template.header')
@include('template.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex flex-row justify-content-between align-items-center">
                    <h1 class="m-0 font-weight-bold">{{ $title }}</h1>
                    <a href="{{ route('form-create-kategori') }}" class="btn btn-danger">Tambah Kategori</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable Kategori</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-md-responsive">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Aksi</th>
                                        <th scope="col">Name Kategori</th>
                                        <th scope="col">Slug</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody-dark">
                                    @foreach ($category_list as $kategori)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <a href="{{ route('form-edit-role', $kategori['id']) }}"
                                                    class="btn btn-warning btn-md mr-2 text-decoration-none">Update</a>
                                                <form action="{{ route('delete_role', $kategori['id']) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-md"
                                                        onclick="return confirm('Anda Yakin Mau Hapus Data?')">
                                                        Delete
                                                    </button>
                                                </form>

                                            </td>
                                            <td>{{ $kategori['name'] }}</td>
                                            <td>{{ $kategori['slug'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->

</div>
@include('template.footer')
