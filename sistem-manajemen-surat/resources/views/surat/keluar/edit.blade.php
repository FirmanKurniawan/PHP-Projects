@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Surat Keluar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('surat.surat-keluar.index') }}">Surat Keluar</a></li>
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
                    <h3 class="card-title">Pembuatan Surat Keluar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('surat.surat-keluar.update', $surat->id) }}" method="POST">
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
                        <button type="button" class="btn btn-success mb-2" onclick="addField(this, event)">
                            <i class="fas fa-plus"></i> Tambah Pegawai
                        </button>
                        <div class="wrapper-field">
                            @foreach ($surat->Pegawai as $p)
                                <div class="form-group">
                                    <div class="input-group">
                                        @if ($loop->iteration == 1)
                                            <select id="pegawai{{ $p->id }}"
                                                class="form-control select2pegawai @error('pegawai') is-invalid @enderror"
                                                name="pegawai[]">
                                                @foreach ($pegawais as $pegawai)
                                                    <option value="{{ $pegawai->id }}"
                                                        @if (old('pegawai', $p->id) == $pegawai->id) selected @endif>
                                                        {{ $pegawai->nama_pegawai }} -
                                                        {{ $pegawai->nip }} - {{ $pegawai->Pangkat->nama_pangkat }} -
                                                        {{ $pegawai->Jabatan->nama_jabatan }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select id="pegawai{{ $p->id }}"
                                                class="form-control select2pegawai @error('pegawai') is-invalid @enderror"
                                                name="pegawai[]">
                                                @foreach ($pegawais as $pegawai)
                                                    <option value="{{ $pegawai->id }}"
                                                        @if (old('pegawai', $p->id) == $pegawai->id) selected @endif>
                                                        {{ $pegawai->nama_pegawai }} -
                                                        {{ $pegawai->nip }} - {{ $pegawai->Pangkat->nama_pangkat }} -
                                                        {{ $pegawai->Jabatan->nama_jabatan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button type="button" onclick="removeField(this, event)"
                                                    class="btn btn-danger"><i class="fas fa-minus"></i></button>
                                            </div>
                                        @endif
                                        @error('pegawai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Tujuan Surat</label>
                            <select id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror"
                                name="kategori_id">
                                <option value disabled hidden>-- Pilih Tujuan Surat --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        @if (old('kategori_id', $surat->kategori_id) == $kategori->id) selected @endif>
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
                            <label>Tahun</label>
                            <div class="input-group date" id="tahun" data-target-input="nearest">
                                <div class="input-group-append" data-target="#tahun" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text"
                                    class="form-control datetimepicker-input @error('tahun') is-invalid @enderror"
                                    data-target="#tahun" name="tahun" placeholder="Pilih Tahun"
                                    value="{{ old('tahun', $surat->tahun) }}" />
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pelaksanaan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right @error('tanggal') is-invalid @enderror"
                                    id="tanggal" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}">
                            </div>
                            @error('tanggal')
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
                            <label for="lokasi_terbit">Lokasi Pembuatan Surat</label>
                            <input type="text" class="form-control @error('lokasi_terbit') is-invalid @enderror"
                                id="lokasi_terbit" name="lokasi_terbit" placeholder="Masukkan Nama Lokasi..."
                                value="{{ old('lokasi_terbit', $surat->lokasi_terbit) }}">
                            @error('lokasi_terbit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pembuatan Surat</label>
                            <div class="input-group date" id="tanggal_terbit" data-target-input="nearest">
                                <div class="input-group-append" data-target="#tanggal_terbit" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text"
                                    class="form-control datetimepicker-input @error('tanggal_terbit') is-invalid @enderror"
                                    data-target="#tanggal_terbit" placeholder="Pilih Tahun"
                                    value="{{ old('tanggal_terbit', $surat->tanggal_terbit) }}" name="tanggal_terbit" />
                                @error('tanggal_terbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Penandatangan</label>
                            <select class="form-control select2penandatangan @error('penandatangan') is-invalid @enderror"
                                style="width: 100%;" name="penandatangan">
                                @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}"
                                        @if (old('penandatangan', $surat->penandatangan) == $pegawai->id) selected @endif>
                                        {{ $pegawai->nama_pegawai }} - {{ $pegawai->nip }}</option>
                                @endforeach
                            </select>
                            @error('penandatangan')
                                <div class="invalid-feedback">
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
            $('#tahun').datetimepicker({
                format: 'YYYY'
            });
            $('#tanggal_terbit').datetimepicker({
                format: 'L'
            });
            $('#tanggal').daterangepicker()
            $('.select2pegawai').select2({
                theme: 'bootstrap4',
                width: '100%',
            })
            $('.select2penandatangan').select2({
                theme: 'bootstrap4',
                width: '100%',
                placeholder: '-- Pilih Penandatangan --',
            })
            $('.select2lokasi').select2({
                theme: 'bootstrap4',
                width: '100%',
                placeholder: '-- Pilih Lokasi --',
            })
        });

        const pegawais = [
            @foreach ($pegawais as $pegawai)
                {
                    "id": {{ $pegawai->id }},
                    "nama": "{{ $pegawai->nama_pegawai }}",
                    "nip": "{{ $pegawai->nip }}",
                    "pangkat": "{{ $pegawai->Pangkat->nama_pangkat }}",
                    "jabatan": "{{ $pegawai->Jabatan->nama_jabatan }}",
                },
            @endforeach
        ];
        let options = "";
        for (const pegawai of pegawais) {
            options +=
                `<option value="${pegawai.id}">${pegawai.nama} - ${pegawai.nip} - ${pegawai.pangkat} - ${pegawai.jabatan}</option>`
        }

        let totalField = {{ count($surat->Pegawai) }};
        const maxField = {{ count($pegawais) }};

        function addField(element, e) {
            const wrapper = $(".wrapper-field");

            const field = `
                <div class="form-group">
                    <div class="input-group">
                        <select id="pegawai${totalField}x" class="form-control select2pegawai" name="pegawai[]">
                            <option></option>
                            ${options}
                        </select>
                        <div class="input-group-append">
                            <button type="button" onclick="removeField(this, event)" class="btn btn-danger"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
            `;
            if (totalField < maxField) {
                totalField += 1;
                $(wrapper).append(field);
                $('.select2pegawai').select2({
                    theme: 'bootstrap4',
                    width: '100%',
                })
            } else {
                toastr.error('Input sudah mencapai batas maksimal pegawai yang ada!');
            }
        }

        function removeField(element, e) {
            totalField -= 1;
            element.parentElement.parentElement.parentElement.remove();
        }
    </script>
@endsection
