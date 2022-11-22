<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Kelas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Kelas</li>
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
            <form method="post" action="<?= base_url(); ?>/kelas/save">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">SISWA </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="<?= base_url(); ?>/kelas/save">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." id="kelas"
                                            name="kelas">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>PRODI</label>
                                        <select class="form-control" id="prodi" name="prodi">
                                            <?php
                                            foreach ($prodi as $key) { ?>
                                            <option value="<?= $key['prodi']; ?>"><?= $key['prodi']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>