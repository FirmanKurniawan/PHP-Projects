@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Pegawai</li>
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
                                    <th>Nama Pegawai</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawais as $pegawai)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pegawai->nama_pegawai }}</td>
                                        <td>{{ $pegawai->nip }}</td>
                                        <td>{{ $pegawai->Jabatan->nama_jabatan }}</td>
                                        <td>{{ $pegawai->Pangkat->nama_pangkat }} / {{ $pegawai->Pangkat->golongan }}
                                        </td>
                                        <td class="text-center"><button type="button"
                                                onclick="openEditModal(this, {{ $pegawai->id }}, '{{ $pegawai->nama_pegawai }}', '{{ $pegawai->nip }}', {{ $pegawai->jabatan_id }}, {{ $pegawai->pangkat_id }})"
                                                class="btn btn-warning btn-sm">
                                                <span class="icon text-white-20">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </button>
                                            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST"
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
                    <h4 class="modal-title">Tambah Data Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pegawai.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_pegawai_create">Nama Pegawai</label>
                            <input type="text" class="form-control @error('nama_pegawai_create') is-invalid @enderror"
                                id="nama_pegawai_create" name="nama_pegawai_create" placeholder="Masukkan Nama Pegawai..."
                                value="{{ old('nama_pegawai_create') }}">
                            @error('nama_pegawai_create')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip_create">NIP</label>
                            <input type="text" class="form-control @error('nip_create') is-invalid @enderror"
                                id="nip_create" name="nip_create" placeholder="Masukkan NIP..."
                                value="{{ old('nip_create') }}">
                            @error('nip_create')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control @error('jabatan_create') is-invalid @enderror" name="jabatan_create">
                                <option value disabled selected>Pilih Jabatan</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}" @if(old('jabatan_create') == $jabatan->id) selected @endif>{{ $jabatan->nama_jabatan }}</option>
                                @endforeach
                            </select>
                            @error('jabatan_create')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pangkat</label>
                            <select class="form-control @error('pangkat_create') is-invalid @enderror" name="pangkat_create">
                                <option value disabled selected>Pilih Pangkat</option>
                                @foreach ($pangkats as $pangkat)
                                    <option value="{{ $pangkat->id }}" @if(old('pangkat_create') == $pangkat->id) selected @endif>{{ $pangkat->nama_pangkat }} / {{ $pangkat->golongan }}</option>
                                @endforeach
                            </select>
                            @error('pangkat_create')
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
                    <h4 class="modal-title">Edit Data Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="formedit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_pegawai" id="id_pegawai" value="{{ old('id_pegawai') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_pegawai_edit">Nama Pegawai</label>
                            <input type="text" class="form-control @error('nama_pegawai_edit') is-invalid @enderror"
                                id="nama_pegawai_edit" name="nama_pegawai_edit" placeholder="Masukkan Nama Pegawai..."
                                value="{{ old('nama_pegawai_edit') }}">
                            @error('nama_pegawai_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip_edit">NIP</label>
                            <input type="text" class="form-control @error('nip_edit') is-invalid @enderror" id="nip_edit"
                                name="nip_edit" placeholder="Masukkan NIP..." value="{{ old('nip_edit') }}">
                            @error('nip_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select id="jabatan_edit" class="form-control @error('jabatan_edit') is-invalid @enderror" name="jabatan_edit">
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}" @if(old('jabatan_edit') == $jabatan->id) selected @endif>{{ $jabatan->nama_jabatan }}</option>
                                @endforeach
                            </select>
                            @error('jabatan_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pangkat</label>
                            <select id="pangkat_edit" class="form-control @error('pangkat_edit') is-invalid @enderror" name="pangkat_edit">
                                @foreach ($pangkats as $pangkat)
                                    <option value="{{ $pangkat->id }}" @if(old('pangkat_edit') == $pangkat->id) selected @endif>{{ $pangkat->nama_pangkat }} / {{ $pangkat->golongan }}</option>
                                @endforeach
                            </select>
                            @error('pangkat_edit')
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
                @if ($errors->has('nama_pegawai_edit') || $errors->has('nip_edit') || $errors->has('jabatan_edit') || $errors->has('pangkat_edit'))
                    const id = $('#id_pegawai').val();
                    let url = '{{ route('pegawai.index') }}';
                    url += '/' + id;
                    $("#formedit").attr('action', url);
                    $('#modal-update').modal('show');
                @endif
                @if ($errors->has('nama_pegawai_create') || $errors->has('nip_create') || $errors->has('jabatan_create') || $errors->has('pangkat_create'))
                    $('#modal-create').modal('show');
                @endif
            });
        </script>
    @endif

    <script>
        function openEditModal(element, id, nama_pegawai, nip, jabatan_id, pangkat_id) {
            let uri = '{{ route('pegawai.index') }}';
            uri += '/' + id;
            $("#formedit").attr('action', uri);
            $("#nama_pegawai_edit").val(nama_pegawai);
            $("#nip_edit").val(nip);
            $("#id_pegawai").val(id);
            $("#jabatan_edit").val(jabatan_id);
            $("#pangkat_edit").val(pangkat_id);
            $('#modal-update').modal('show');
        }
    </script>
@endsection
