<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Taruna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Taruna</li>
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
            <form method="post" action="<?= base_url('siswa/update/' . $siswa['id_siswa']) ?>">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">BIODATA SISWA TARUNA</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>NAMA TARUNA</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." id="nama"
                                        name="nama" value="<?= $siswa['nama']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>KELAS</label>
                                    <select class="form-control" id="kelas" name="kelas">
                                        <?php
                                        foreach ($kelas as $key) { ?>
                                        <option value="<?= $key['id_kelas']; ?>"><?= $key['kelas']; ?></option>

                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>NIT</label>
                                    <input type="text" class="form-control" placeholder="C-" id="nit" name="nit"
                                        value="<?= $siswa['nit']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>PRODI</label>
                                    <select class="form-control" id="prodi" name="prodi">
                                        <?php
                                        foreach ($prodi as $key) { ?>
                                        <option value="<?= $key['id_prodi']; ?>"><?= $key['prodi']; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>

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