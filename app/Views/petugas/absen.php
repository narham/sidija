<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DASHBOARD ABSEN</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $bread; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="conten">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <div class="row">
                                <div class="col col-sm">
                                    <h3><?= $h_pagi; ?></h3>
                                    <p>HADIR</p>
                                </div>
                                <div class="col col-sm">
                                    <h3><?= $s_pagi; ?></h3>
                                    <p>KURANG</p>
                                </div>
                                <div class="col col-sm">
                                    <h3><?= $j_pagi; ?></h3>
                                    <p>JUMLAH</p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <h3>APEL PAGI</h3>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>/absen/apel/pagi" class="small-box-footer">Selengkapnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <div class="row">
                                <div class="col col">
                                    <h3><?= $h_malam; ?></h3>
                                    <p>HADIR</p>
                                </div>
                                <div class="col col">
                                    <h3><?= $s_malam; ?></h3>
                                    <p>KURANG</p>
                                </div>
                                <div class="col col">
                                    <h3><?= $j_malam; ?></h3>
                                    <p>JUMLAH</p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <h3>APEL MALAM</h3>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>/absen/apel/malam" class="small-box-footer">Selengkapnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <div class="row">
                                <div class="col col-sm">
                                    <h3>150</h3>
                                    <p>HADIR</p>
                                </div>
                                <div class="col col-sm">
                                    <h3>150</h3>
                                    <p>KURANG</p>
                                </div>
                                <div class="col col-sm">
                                    <h3>150</h3>
                                    <p>JUMLAH</p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <h3>MAKAN</h3>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>/absen/makan" class="small-box-footer">Selengkapnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ABSEN TARUNA APEL PAGI</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>

                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>TANGGAL</th>
                                        <th>NIT</th>
                                        <th>NAMA TARUNA</th>
                                        <th>KELAS</th>
                                        <th>PRODI</th>
                                        <th>KEGIATAN</th>
                                        <th>KETERANGAN</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($apelpagi as $key) { ?>
                                    <tr>
                                        <td><?= $key['tanggal']; ?></td>
                                        <td><?= $key['nit']; ?></td>
                                        <td><?= $key['nama']; ?></td>
                                        <td><?= $key['kelas']; ?></td>
                                        <td><?= $key['prodi']; ?></td>
                                        <td><?= $key['kegiatan']; ?></td>
                                        <td><?= $key['keterangan']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DABSEN TARUNA APEL MALAM</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>

                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>TANGGAL</th>
                                        <th>NIT</th>
                                        <th>NAMA TARUNA</th>
                                        <th>KELAS</th>
                                        <th>PRODI</th>
                                        <th>KEGIATAN</th>
                                        <th>KETERANGAN</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($apelmalam as $key) { ?>
                                    <tr>
                                        <td><?= $key['tanggal']; ?></td>
                                        <td><?= $key['nit']; ?></td>
                                        <td><?= $key['nama']; ?></td>
                                        <td><?= $key['kelas']; ?></td>
                                        <td><?= $key['prodi']; ?></td>
                                        <td><?= $key['kegiatan']; ?></td>
                                        <td><?= $key['keterangan']; ?></td>
                                    </tr>


                                    <?php } ?>
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ABSEN TARUNA MAKAN</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>

                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>TANGGAL</th>
                                        <th>NIT</th>
                                        <th>NAMA TARUNA</th>
                                        <th>KELAS</th>
                                        <th>PRODI</th>
                                        <th>KEGIATAN</th>
                                        <th>KETERANGAN</th>
                                    </tr>

                                </thead>
                                <tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>