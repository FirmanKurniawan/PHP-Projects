@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nomor Surat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Nomor Surat</li>
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
                                    <th>Nama Nomor Surat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nomors as $nomor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $nomor->nomor_surat }}</td>
                                        <td class="text-center"><button type="button"
                                                onclick="openEditModal(this, {{ $nomor->id }}, '{{ $nomor->nomor_surat }}')"
                                                class="btn btn-warning btn-sm">
                                                <span class="icon text-white-20">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </button>
                                            <form action="{{ route('nomor.destroy', $nomor->id) }}" method="POST"
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
                    <h4 class="modal-title">Tambah Data Nomor Surat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('nomor.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomor_surat_create">Nama Nomor Surat</label>
                            <input type="text" class="form-control @error('nomor_surat_create') is-invalid @enderror"
                                id="nomor_surat_create" name="nomor_surat_create" placeholder="Masukkan Nomor Surat..."
                                value="{{ old('nomor_surat_create') }}">
                            @error('nomor_surat_create')
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
                    <h4 class="modal-title">Edit Data Nomor Surat</h4>
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
                            <label for="nomor_surat_edit">Nama Nomor Surat</label>
                            <input type="text" class="form-control @error('nomor_surat_edit') is-invalid @enderror"
                                id="nomor_surat_edit" name="nomor_surat_edit" placeholder="Masukkan Nomor Surat..."
                                value="{{ old('nomor_surat_edit') }}">
                            @error('nomor_surat_edit')
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
                @error('nomor_surat_edit')
                    const id = $('#id_nomor').val();
                    let url = '{{ route('pangkat.index') }}';
                    url += '/' + id;
                    $("#formedit").attr('action', url);
                    $('#modal-update').modal('show');
                @enderror
                @error('nomor_surat_create')
                    $('#modal-create').modal('show');
                @enderror
            });
        </script>
    @endif

    <script>
        function openEditModal(element, id, nama_jabatan) {
            let uri = '{{ route('nomor.index') }}';
            uri += '/' + id;
            $("#formedit").attr('action', uri);
            $("#nomor_surat_edit").val(nama_jabatan);
            $("#id_nomor").val(id);
            $('#modal-update').modal('show');
        }
    </script>
@endsection
