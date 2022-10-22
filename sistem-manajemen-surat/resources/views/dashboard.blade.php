@extends("layouts.main")

@section("content")
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $surat_masuk->count() }}</h3>
                        <p>Surat Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email-unread"></i>
                    </div>
                    <a href="{{ route("surat.surat-masuk.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $surat_keluar->count() }}</h3>
                        <p>Surat Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email"></i>
                    </div>
                    <a href="{{ route("surat.surat-keluar.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $pegawai->count() }}</h3>
                        <p>Pegawai</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route("pegawai.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $lokasi->count() }}</h3>
                        <p>Lokasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-location"></i>
                    </div>
                    <a href="{{ route("lokasi.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $jabatan->count() }}</h3>
                        <p>Jabatan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-folder"></i>
                    </div>
                    <a href="{{ route("jabatan.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $pangkat->count() }}</h3>
                        <p>Pangkat</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-flag"></i>
                    </div>
                    <a href="{{ route("pangkat.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $nomor->count() }}</h3>
                        <p>Nomor</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-infinite"></i>
                    </div>
                    <a href="{{ route("nomor.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $kategori->count() }}</h3>
                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-grid"></i>
                    </div>
                    <a href="{{ route("kategori.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $periode->count() }}</h3>
                        <p>Periode</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-calendar"></i>
                    </div>
                    <a href="{{ route("periode.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection