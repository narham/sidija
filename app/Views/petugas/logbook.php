<?= $this->extend(''); ?><?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">E-Logbook Duty</h1>
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
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">E-LogBook Duty</h3>
                        </div>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                        <?php endif; ?>
                        <!-- form start -->
                        <form action="<?= base_url(); ?>/logbook/save" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal"
                                        aria-describedby="helpId" placeholder="Tanggal" value="<?= date('Y-m-d'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <select class="form-control" name="kegiatan" id="kegiatan">
                                        <option value="APEL PAGI">APEL PAGI</option>
                                        <option value="APEL MALAM">APEL MALAM</option>
                                        <option value="MAKAN PAGI">MAKAN PAGI</option>
                                        <option value="MAKAN SIANG">MAKAN SIANG</option>
                                        <option value="MAKAN MALAM">MAKAN MALAM</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <textarea class="form-control" name="catatan" id="catatan" rows="10"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0">Catatan APEL MALAM</h3>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"><?= $log_apel_malam->tanggal ?? 'Belum ada Catatan'; ?></h6>
                            <br>

                            <p class="card-text"><?= $log_apel_malam->catatan ?? 'Belum ada Catatan'; ?></p>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0">Catatan MAKAN PAGI</h3>
                            <h6 class="card-title"><?= $log_makan_pagi->tanggal ?? 'Belum ada Catatan'; ?></h6>
                            <br>
                        </div>
                        <div class="card-body">

                            <p class="card-text"><?= $log_makan_pagi->catatan ?? 'Belum ada Catatan'; ?></p>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0">Catatan MAKAN SIANG</h3>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"><?= $log_makan_siang->tanggal ?? 'Belum ada Catatan'; ?></h6>
                            <br>

                            <p class="card-text"><?= $log_makan_siang->catatan ?? 'Belum ada Catatan'; ?></p>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0">Catatan MAKAN MALAM</h3>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"><?= $log_makan_malam->tanggal ?? 'Belum ada Catatan'; ?></h6>
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>