<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>
<!--  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Managemen Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Managemen Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DATABASE USER ACCOUNT POLTEKBANG MAKASSAR</h3>
                    <div class="card-tools">
                        <a href="<?= base_url('user/add'); ?>" class="btn btn-primary">Tambah User</a>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aktifasi</th>
                                <th>Status</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($user as $row) {
                            ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['password']; ?></td>
                                <td><?php
                                        if ($row['is_active'] == 0) {
                                            // echo 'Blok';
                                            echo 'span class="badge bg-danger">Block</span>';
                                        } else {
                                            // echo 'Aktif';
                                            echo '<span class="badge bg-success">Aktif</span>';
                                        }
                                        ?></td>
                                <td><?php
                                        if ($row['status'] == 1) {
                                            // echo 'Petugas';
                                            echo '<span class="badge bg-warning">Petugas</span>';
                                        } else {
                                            // echo 'Admin';
                                            echo '<span class="badge bg-primary">Admin</span>';
                                        }
                                        ?></td>
                                <td>
                                    <a title="Edit" href="<?php echo base_url('user/edit/' . $row['id_users']) ?>"
                                        class="btn btn-info">Edit</a>
                                    <a title="Delete" href="<?php echo base_url('user/delete/' . $row['id_users']) ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                                </td>


                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>


        </div>

        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<?= $this->endSection(); ?>