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
                            <form action="{{ route('update-user-access', $data_edit->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Username</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="formGroupExampleInput" placeholder="Masukan Username" name="name"
                                        value="{{ $data_edit->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="formGroupExampleInput2" placeholder="Masukan Email" name="email"
                                        value="{{ $data_edit->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 m-0 p-0">
                                    <div class="form-group">
                                        <label for="role">
                                            Roles
                                        </label>
                                        <select name="role_id" id="role"
                                            class="form-control @error('role_id') is-invalid @enderror">
                                            <option value="">Pilih Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $role->id == $data_edit->role_id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('user-access') }}" class="btn btn-info">Kembali</a>
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
