<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $judul; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $bread; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <card class="card-header">
                            <h5 class="card-title">BUAT JADWAL PIKET</h5>
                        </card>
                        <div class="card-body">

                            <form action="<?= base_url(); ?>/piket/save" method="post">
                                <div class="form-group">
                                    <label for="">Tanggal piket</label>
                                    <input type="date" class="form-control" name="tanggal"
                                        value="<?= date('Y-m-d'); ?>">
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                                <div class="card">
                                    <card class="card-header">
                                        <h3>Database Taruna</h3>
                                    </card>
                                    <div class="card card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NIT</th>
                                                    <th>Nama Taruna</th>
                                                    <th>Kelas</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php


                                                $i = 1;
                                                foreach ($siswa as $row) { ?>


                                                <tr>
                                                    <td><input type="checkbox" name="id[]" id="id[]"
                                                            value="<?= $row['id_siswa']; ?>">
                                                    </td>
                                                    <td><?php echo $row['nit']; ?></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td><?php echo $row['kelas']; ?></td>
                                                </tr>

                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-4">
                    <div class="card">
                        <card class="card-header">
                            <h3>Taruna Petugas Jaga</h3><br>
                            <h4>Tanggal <?= date('Y-m-d'); ?></h4>
                        </card>
                        <div class="card card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIT</th>
                                        <th>Nama Taruna</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($piket as $piket) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $piket['nit']; ?></td>
                                        <td><?= $piket['nama']; ?></td>
                                    </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>