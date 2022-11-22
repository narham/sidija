<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">APEL PAGI</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
                        <li class="breadcrumb-item active">APEL PAGI</li>
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
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ABSEN APEL</h3>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                            <form action="<?= base_url(); ?>/absen/pagi/save" method="post">
                                <table class="table table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"></th>
                                            <th rowspan='2'>NIT</th>
                                            <th rowspan='2'>Nama</th>
                                            <th rowspan='2'>Prodi</th>
                                            <?php for ($tanggal_table = 1; $tanggal_table <= 31; $tanggal_table++) {
                                                echo "<th rowspan='2'>$tanggal_table</th>";
                                            } ?>
                                            <th colspan="4">Jumlah</th>
                                        </tr>
                                        <tr>
                                            <th>A</th>
                                            <th>I</th>
                                            <th>S</th>
                                            <th>T</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($siswa as $row) { ?>
                                        <tr>
                                            <td><input type="checkbox" name="id[]" id="id[]"
                                                    value="<?= $row['id_siswa']; ?>">
                                            </td>
                                            <td><?php echo $row['nit']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['prodi']; ?></td>
                                        </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
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
                                    <option value="SAKIT">Sakit</option>
                                    <option value="IZIN">Ijin</option>
                                    <option value="ALPHA">Alpha</option>
                                    <option value="HADIR">Hadir</option>
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
            </div>
            <!-- /.col-md-6 -->

        </div>
    </div>

</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>