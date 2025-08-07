@include('template.header')
@include('template.sidebar')
@php
    use Illuminate\Support\Str;
@endphp
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex flex-row justify-content-between align-items-center">
                    <h1 class="m-0 font-weight-bold">{{ $title }}</h1>
                    @canAccess('create-app')
                    <a href="{{ route('form-create-news') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                    @endcanAccess
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close " data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable News</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-hover table-md-responsive">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Excerpt</th>
                                            <th scope="col">Content</th>
                                            <th scope="col">Image Cover</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-dark">
                                        @foreach ($data_news as $news)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $news['title'] }}</td>
                                                <td>{{ $news['slug'] }}</td>
                                                <td>{{ $news['excerpt'] }}</td>
                                                <td>{{ Str::limit(strip_tags($news['content']), 80, '...') }}</td>
                                                <td><img src="{{ asset('storage/' . $news['image']) }}" alt="image"
                                                        width="120">
                                                </td>
                                                <td width="15%">
                                                    @canAccess('edit-app')
                                                    <a href="{{ route('form-edit-news', $news['id']) }}"
                                                        class="btn btn-warning btn-md mr-2 text-decoration-none mb-lg-0 mb-2"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    @endcanAccess
                                                    @canAccess('delete-app')
                                                    <form action="{{ route('delete-news', $news['id']) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-md"
                                                            onclick="return confirm('Anda Yakin Mau Hapus Data?')">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                    @endcanAccess
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->
</div>
@include('template.footer')
