<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>
<!--  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
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
                <div class="col-lg">
                    <div class="callout callout-success">
                        <h1>Selamat Datang</h1>

                        <h5><?= session()->get('nama'); ?></h5>

                        <div class="info">
                            <?php
                            if (session()->get('status') == 0) {
                                echo '<span class="badge badge-success">ADMINISTRATOR</span>';
                            } else {
                                echo '<span class="badge badge-warning">PETUGAS JAGA</span>';
                            }  ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $j_siswa; ?></h3>

                            <p>JUMLAH TARUNA</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= base_url(); ?>/siswa" class="small-box-footer">Selengkapnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $j_prodi; ?></h3>

                            <p>JUMLAH PORDI</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= base_url(); ?>/prodi" class="small-box-footer">Selengkapnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $j_kelas; ?></h3>

                            <p>JUMLAH KELAS</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= base_url(); ?>/kelas" class="small-box-footer">Selengkapnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php
                $no = 1;
                foreach ($kelas as $key) { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $key['kelas']; ?></h3>
                        </div>
                        <a href="<?php echo base_url('kelas/' . $key['id_kelas']) ?>"
                            class="small-box-footer">Selengkapnya
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="m-0">Catatan APEL PAGI</h3>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">
                                    <b>
                                        <?= $log_apel_pagi->tanggal ?? 'Belum ada Catatan'; ?>
                                    </b>
                                </h6>
                                <br>

                                <p class="card-text"><?= $log_apel_pagi->catatan ?? 'Belum ada Catatan'; ?></p>

                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="m-0">Catatan APEL PAGI</h3>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">
                                    <b>
                                        <?= $log_apel_malam->tanggal ?? 'Belum ada Catatan'; ?>
                                    </b>
                                </h6>
                                <br>

                                <p class="card-text"><?= $log_apel_malam->catatan ?? 'Belum ada Catatan'; ?></p>

                            </div>
                        </div>

                        <div class="card">
                            <card class="card-header">
                                <h3>Daftar Hadir Petugas Jaga</h3>
                            </card>
                            <div class="card card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIT</th>
                                            <th>Nama Taruna</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jaga as $jaga) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $jaga['nit']; ?></td>
                                            <td><?= $jaga['nama']; ?></td>
                                            <td><?= $jaga['keterangan']; ?></td>
                                        </tr>
                                        <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-4">
                        <div class="card card-green">
                            <div class="card-header">
                                <h3 class="m-0">Catatan MAKAN PAGI</h3>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">
                                    <b>
                                        <?= $log_makan_pagi->tanggal ?? 'Belum ada Catatan'; ?>
                                    </b>
                                </h6>
                                <br>

                                <p class="card-text"><?= $log_makan_pagi->catatan ?? 'Belum ada Catatan'; ?></p>

                            </div>
                        </div>

                        <div class="card card-yellow">
                            <div class="card-header">
                                <h3 class="m-0">Catatan MAKAN PAGI</h3>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">
                                    <b>
                                        <?= $log_makan_siang->tanggal ?? 'Belum ada Catatan'; ?>
                                    </b>
                                </h6>
                                <br>

                                <p class="card-text"><?= $log_makan_siang->catatan ?? 'Belum ada Catatan'; ?></p>

                            </div>
                        </div>

                        <div class="card card-red">
                            <div class="card-header">
                                <h3 class="m-0">Catatan MAKAN PAGI</h3>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">
                                    <b>
                                        <?= $log_makan_malam->tanggal ?? 'Belum ada Catatan'; ?>
                                    </b>
                                </h6>
                                <br>

                                <p class="card-text"><?= $log_makan_malam->catatan ?? 'Belum ada Catatan'; ?></p>

                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>

<?= $this->endSection(); ?>