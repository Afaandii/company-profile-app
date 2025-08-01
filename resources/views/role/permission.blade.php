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
                            <form action="{{ route('update-role', $data_edit->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <h1 class="bold">Role : {{ $data_edit->name }}</h1>
                                {{-- Permission Access --}}
                                <div class="col-12 mb-3 p-0">
                                    <h5 class="mb-2 fw-bold">User Permission</h5>
                                    @foreach ($permissions as $permission)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input permission-checkbox" type="checkbox"
                                                id="perm-{{ $permission->id }}" data-role-id="{{ $data_edit->id }}"
                                                data-permission-id="{{ $permission->id }}"
                                                {{ in_array($permission->id, $current_permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="perm-{{ $permission->id }}">{{ ucfirst(str_replace('-', ' ', $permission->name)) }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group d-flex justify-content-between align-items-center">
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
