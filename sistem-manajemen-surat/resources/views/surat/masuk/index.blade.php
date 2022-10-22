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
                        <li class="breadcrumb-item">Surat</li>
                        <li class="breadcrumb-item active">Surat Masuk</li>
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
                    <a href="{{ route('surat.surat-masuk.create') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Kategori</th>
                                    <th>Periode</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal Masuk</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surats as $surat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $surat->Nomor->nomor_surat }}</td>
                                        <td>{{ $surat->Kategori->nama_kategori }}</td>
                                        <td>{{ $surat->Periode->nama_periode }}</td>
                                        <td>{{ $surat->Lokasi->nama_lokasi }}</td>
                                        <td>{{ $surat->tanggal_masuk }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('surat.surat-masuk.download', $surat->id) }}" target="_blank" class="btn btn-success btn-sm" title="Download File">
                                                <span class="icon text-white-20">
                                                    <i class="fas fa-download"></i>
                                                </span>
                                            </a>
                                            <button type="button" class="btn btn-info btn-sm" title="Lihat Detail"
                                                data-toggle="modal" data-target="#modal-detail{{ $surat->id }}">
                                                <span class="icon text-white-20">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </button>
                                            <a href="{{ route('surat.surat-masuk.edit', $surat->id) }}"
                                                class="btn btn-warning btn-sm" title="Edit Data">
                                                <span class="icon text-white-20">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </a>
                                            <form action="{{ route('surat.surat-masuk.destroy', $surat->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Apakah ingin menghapus data ini ?')"
                                                    class="btn btn-danger btn-sm" title="Hapus Data">
                                                    <span class="icon text-white-20">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-detail{{ $surat->id }}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Detail Surat</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item"
                                                            src="{{ asset('storage/' . $surat->file) }}"
                                                            allowfullscreen>
                                                        </iframe>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
