@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jabatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Jabatan</li>
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
                                    <th>Nama Jabatan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jabatans as $jabatan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jabatan->nama_jabatan }}</td>
                                        <td class="text-center"><button type="button"
                                                onclick="openEditModal(this, {{ $jabatan->id }}, '{{ $jabatan->nama_jabatan }}')"
                                                class="btn btn-warning btn-sm">
                                                <span class="icon text-white-20">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </button>
                                            <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST"
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
                    <h4 class="modal-title">Tambah Data Jabatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('jabatan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_jabatan_create">Nama Jabatan</label>
                            <input type="text" class="form-control @error('nama_jabatan_create') is-invalid @enderror"
                                id="nama_jabatan_create" name="nama_jabatan_create" placeholder="Masukkan Nama Jabatan..."
                                value="{{ old('nama_jabatan_create') }}">
                            @error('nama_jabatan_create')
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
                    <h4 class="modal-title">Edit Data Jabatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="formedit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_jabatan" id="id_jabatan" value="{{ old('id_jabatan') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_jabatan_edit">Nama Jabatan</label>
                            <input type="text" class="form-control @error('nama_jabatan_edit') is-invalid @enderror"
                                id="nama_jabatan_edit" name="nama_jabatan_edit" placeholder="Masukkan Nama Jabatan..."
                                value="{{ old('nama_jabatan_edit') }}">
                            @error('nama_jabatan_edit')
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
                @error('nama_jabatan_edit')
                    const id = $('#id_jabatan').val();
                    let url = '{{ route('pangkat.index') }}';
                    url += '/' + id;
                    $("#formedit").attr('action', url);
                    $('#modal-update').modal('show');
                @enderror
                @error('nama_jabatan_create')
                    $('#modal-create').modal('show');
                @enderror
            });
        </script>
    @endif

    <script>
        function openEditModal(element, id, nama_jabatan) {
            let uri = '{{ route('jabatan.index') }}';
            uri += '/' + id;
            $("#formedit").attr('action', uri);
            $("#nama_jabatan_edit").val(nama_jabatan);
            $("#id_jabatan").val(id);
            $('#modal-update').modal('show');
        }
    </script>
@endsection
