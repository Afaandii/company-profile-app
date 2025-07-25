@include('template.header')
@include('template.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 font-weight-bold">{{ $title_role_create }}</h1>
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
                            <form action="{{ route('store_role') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nama Role</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Masukan nama role" name="nama_role">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Handle Access</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Handle Access" name="handle_acc_role">
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
