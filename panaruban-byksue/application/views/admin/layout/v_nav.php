 <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                                <div class="input-group custom-search-form">
                                    <span class="input-group-btn">
                                        
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="<?= base_url('mapel') ?>"><i class="fa fa-list-alt fa-fw"></i> Mata Pelajaran</a>
                                <!-- /.nav-second-level -->
                            </li>

                             <li>
                                <a href="<?= base_url('guru') ?>"><i class="fa fa-users fa-fw"></i> Guru</a> 
                            </li>
                           <li>
                                <a href="<?= base_url('siswa') ?>"><i class="fa fa-user fa-fw"></i> Siswa</a>
                            </li>                         

                        

                             <li>
                                <a href="<?= base_url('berita') ?>"><i class="fa fa-newspaper-o fa-fw"></i> Berita</a>
                            </li>

                             <li>
                                <a href="<?= base_url('gallery') ?>"><i class="fa fa-image fa-fw"></i> Gallery</a>
                            </li>

                            <li>
                                <a href="<?= base_url('download') ?>"><i class="fa fa-download fa-fw"></i> Download</a>
                            </li>

                            <li>
                                <a href="<?= base_url('admin/setting') ?>"><i class="fa fa-gear fa-fw"></i> Setting</a>
                            </li>
                                    
                            <li class="active">
                                <a href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header"><?= $title2 ?></h2>
                       