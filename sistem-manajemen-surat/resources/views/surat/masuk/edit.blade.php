@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Surat Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('surat.surat-masuk.index') }}">Surat Masuk</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pembuatan Surat Masuk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('surat.surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <select id="nomor_id" class="form-control @error('nomor_id') is-invalid @enderror"
                                name="nomor_id">
                                <option value disabled hidden>-- Pilih Nomor Surat --</option>
                                @foreach ($nomors as $nomor)
                                    <option value="{{ $nomor->id }}" @if (old('nomor_id', $surat->nomor_id) == $nomor->id) selected @endif>
                                        {{ $nomor->nomor_surat }}</option>
                                @endforeach
                            </select>
                            @error('nomor_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tujuan Surat</label>
                            <select id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror"
                                name="kategori_id">
                                <option value disabled hidden>-- Pilih Tujuan Surat --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" @if (old('kategori_id', $surat->kategori_id) == $kategori->id) selected @endif>
                                        {{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Periode</label>
                            <select id="periode_id" class="form-control @error('periode_id') is-invalid @enderror"
                                name="periode_id">
                                <option value disabled hidden>-- Pilih Periode --</option>
                                @foreach ($periodes as $periode)
                                    <option value="{{ $periode->id }}" @if (old('periode_id', $surat->periode_id) == $periode->id) selected @endif>
                                        {{ $periode->nama_periode }}</option>
                                @endforeach
                            </select>
                            @error('periode_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Lokasi Pelaksanaan</label>
                            <select id="lokasi_id"
                                class="form-control select2lokasi @error('lokasi_id') is-invalid @enderror"
                                name="lokasi_id">
                                @foreach ($lokasis as $lokasi)
                                    <option value="{{ $lokasi->id }}" @if (old('lokasi_id', $surat->lokasi_id) == $lokasi->id) selected @endif>
                                        {{ $lokasi->nama_lokasi }}</option>
                                @endforeach
                            </select>
                            @error('lokasi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Masuk Surat</label>
                            <div class="input-group date" id="tanggal_masuk" data-target-input="nearest">
                                <div class="input-group-append" data-target="#tanggal_masuk" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text"
                                    class="form-control datetimepicker-input @error('tanggal_masuk') is-invalid @enderror"
                                    data-target="#tanggal_masuk" placeholder="Pilih Tanggal"
                                    value="{{ old('tanggal_masuk', $surat->tanggal_masuk) }}" name="tanggal_masuk" />
                                @error('tanggal_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customFile">Upload Surat</label>
                            <div class="custom-file">
                                <input type="file"
                                    class="form-control custom-file-input @error('file') is-invalid @enderror"
                                    id="customFile" name="file">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <small class="ml-2 text-secondary">Format harus pdf, jpeg, jpg, png - Max 1 MB</small>
                            @error('file')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#tanggal_masuk').datetimepicker({
                format: 'L'
            });
            $('.select2lokasi').select2({
                theme: 'bootstrap4',
                width: '100%',
                placeholder: '-- Pilih Lokasi --',
            })
            $(function() {
                bsCustomFileInput.init();
            });
        });
    </script>
@endsection
