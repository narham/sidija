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
            <form method="post" action="<?= base_url('user/update/' . $user['id_users']) ?>">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"><?= $header; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." id="nama"
                                            name="nama" value="<?= $user['nama']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." id="username"
                                            name="username" value="<?= $user['username']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" placeholder="Masuukkan Password Baru"
                                            id="password" name="password" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Aktifasi</label>
                                        <select class="form-control" id="is_active" name="is_active" value>
                                            <?php
                                            foreach ($aktivasi as $key) { ?>
                                            <option value="<?= $key['id_aktivasi']; ?>"><?= $key['is_active']; ?>
                                            </option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <?php
                                            foreach ($status as $key) { ?>
                                            <option value="<?= $key['id_status']; ?>"><?= $key['status']; ?></option>

                                            <?php } ?>
                                        </select>
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
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>