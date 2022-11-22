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
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4>Periksa Entrian Form</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
            </div>
            <?php endif; ?>
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">PRODI </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="<?= base_url('prodi/update/' . $prodi['id_prodi']) ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." id="prodi"
                                        name="prodi" value="<?= $prodi['prodi']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." id="keterangan"
                                        name="keterangan" value="<?= $prodi['keterangan']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>