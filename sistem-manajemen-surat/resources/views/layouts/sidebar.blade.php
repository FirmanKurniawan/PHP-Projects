<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BP-KKN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('surat.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('surat.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Kelola Surat
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('surat.surat-keluar.index') }}" class="nav-link {{ request()->routeIs('surat.surat-keluar.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('surat.surat-masuk.index') }}" class="nav-link {{ request()->routeIs('surat.surat-masuk.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('master/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('master/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("jabatan.index") }}" class="nav-link {{ request()->routeIs('jabatan.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("kategori.index") }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("lokasi.index") }}" class="nav-link {{ request()->routeIs('lokasi.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lokasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("nomor.index") }}" class="nav-link {{ request()->routeIs('nomor.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nomor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("pangkat.index") }}" class="nav-link {{ request()->routeIs('pangkat.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pangkat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("pegawai.index") }}" class="nav-link {{ request()->routeIs('pegawai.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("periode.index") }}" class="nav-link {{ request()->routeIs('periode.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Periode</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <hr style="border-top: 1px solid grey" />
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Ready to Leave?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current
                session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
