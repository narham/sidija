<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

        <span class="brand-text font-weight-light">SIDIJA - POLTEKBANG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>/public/foto/foto.jpg" class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
                <?php
                if (session()->get('status') == 0) {
                    echo '<span class="badge badge-success">ADMINISTRATOR</span>';
                } else {
                    echo '<span class="badge badge-blue">Petuagas Jaga</span>';
                }  ?>
            </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    <h4><b><?= session()->get('nama'); ?></b></h4>
                    <h4><b></b></h4>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('admin'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php
                if (session()->get('status') == 0) : ?>

                <li class="nav-item menu-close">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-briefcase" aria-hidden="true"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('siswa'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Taruna</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kelas'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('prodi'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Prodi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('user'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('piket'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Piket</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-close">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-briefcase" aria-hidden="true"></i>
                        <p>
                            Dinas Jaga
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/piket/jaga" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Petugas Jaga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/absen" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Absensi Taruna</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/logbook" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-LogBook</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-close">
                    <a href="" class="nav-link">
                        <i class="fa fa-print nav-icon" aria-hidden="true"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/laporan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Petugas Jaga</p>
                            </a>
                        </li>
                        <li class="nav-item menu-close">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    ABSEINS TARUNA
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>/laporan/apel" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>APEL</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>/laporan/makan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>MAKAN</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>





                <?php
                if (session()->get('status') == 1) : ?>

                <li class="nav-item menu-close">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-briefcase" aria-hidden="true"></i>
                        <p>
                            Dinas Jaga
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/piket/jaga" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Petugas Jaga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/absen" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Absensi Taruna</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/logbook" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-LogBook</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url(); ?>/auth/logout" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Keluar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>