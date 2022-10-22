@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pangkat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Pangkat</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal"
                        data-target="#modal-create">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pangkat</th>
                                    <th>Golongan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pangkats as $pangkat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pangkat->nama_pangkat }}</td>
                                        <td>{{ $pangkat->golongan }}</td>
                                        <td class="text-center"><button type="button"
                                                onclick="openEditModal(this, {{ $pangkat->id }}, '{{ $pangkat->nama_pangkat }}', '{{ $pangkat->golongan }}')"
                                                class="btn btn-warning btn-sm">
                                                <span class="icon text-white-20">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </button>
                                            <form action="{{ route('pangkat.destroy', $pangkat->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Apakah ingin menghapus data ini ?')"
                                                    class="btn btn-danger btn-sm">
                                                    <span class="icon text-white-20">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Pangkat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pangkat.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_pangkat_create">Nama Pangkat</label>
                            <input type="text" class="form-control @error('nama_pangkat_create') is-invalid @enderror"
                                id="nama_pangkat_create" name="nama_pangkat_create" placeholder="Masukkan Nama Pangkat..."
                                value="{{ old('nama_pangkat_create') }}">
                            @error('nama_pangkat_create')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="golongan_create">Golongan</label>
                            <input type="text" class="form-control @error('golongan_create') is-invalid @enderror"
                                id="golongan_create" name="golongan_create" placeholder="Masukkan Golongan..."
                                value="{{ old('golongan_create') }}">
                            @error('golongan_create')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Pangkat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="formedit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_pangkat" id="id_pangkat" value="{{ old('id_pangkat') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_pangkat_edit">Nama Pangkat</label>
                            <input type="text" class="form-control @error('nama_pangkat_edit') is-invalid @enderror"
                                id="nama_pangkat_edit" name="nama_pangkat_edit" placeholder="Masukkan Nama Pangkat..."
                                value="{{ old('nama_pangkat_edit') }}">
                            @error('nama_pangkat_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="golongan_edit">Golongan</label>
                            <input type="text" class="form-control @error('golongan_edit') is-invalid @enderror"
                                id="golongan_edit" name="golongan_edit" placeholder="Masukkan Golongan..."
                                value="{{ old('golongan_edit') }}">
                            @error('golongan_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

{{-- @dd(URL::previous()) --}}
@section('script')
    @if ($errors->any())
        <script type="text/javascript">
            $(window).on('load', function() {
                @if($errors->has('nama_pangkat_edit') || $errors->has('golongan_edit'))
                    const id = $('#id_pangkat').val();
                    let url = '{{ route('pangkat.index') }}';
                    url += '/' + id;
                    $("#formedit").attr('action', url);
                    $('#modal-update').modal('show');
                @endif
                @if($errors->has('nama_pangkat_create') || $errors->has('golongan_create'))
                    $('#modal-create').modal('show');
                @endif
            });
        </script>
    @endif

    <script>
        function openEditModal(element, id, nama_jabatan, golongan) {
            let uri = '{{ route('pangkat.index') }}';
            uri += '/' + id;
            $("#formedit").attr('action', uri);
            $("#nama_pangkat_edit").val(nama_jabatan);
            $("#golongan_edit").val(golongan);
            $("#id_pangkat").val(id);
            $('#modal-update').modal('show');
        }
    </script>
@endsection
