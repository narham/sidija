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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                            <h5 class="card-title">JADWAL PIKET</h5>
                        </card>
                        <div class="card-body">

                            <form action="<?= base_url(); ?>/piket/jaga/save" method="post">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($piket as $piket) { ?>
                                                <tr>
                                                    <td><input type="checkbox" name="id[]" id="id[]"
                                                            value="<?= $piket['id_siswa']; ?>">
                                                    </td>
                                                    <td><?= $piket['nit']; ?></td>
                                                    <td><?= $piket['nama']; ?></td>
                                                </tr>

                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pengabsenan</h3>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">

                            <input type="text" value="APEL PAGI" hidden="true" id="kegiatan" name="kegiatan">

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <select class="form-control" name="keterangan" id="keterangan">
                                    <option value="HADIR">Hadir</option>
                                    <option value="ALPHA">Alpha</option>
                                    <option value="IZIN">Ijin</option>
                                    <option value="SAKIT">Sakit</option>
                                    <option value="OJT">OJT</option>
                                    <option value="DINAS DALAM">Dinas Dalam</option>
                                    <option value="DINAS LUAR">Dinas Luar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                    aria-describedby="helpId" placeholder="Tanggal" value="<?= date('Y-m-d'); ?>">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                            </form>
                            <br>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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