<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>
<!--  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Managemen Taruna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Managemen Taruna</li>
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
                    <h3 class="card-title">DATABASE TARUNA POLTEKBANG MAKASSAR</h3>
                    <div class="card-tools">
                        <?php
                        if (session()->get('status') == 0) : ?>

                        <a href="<?= base_url('siswa/add'); ?>" class="btn btn-primary">Tambah Taruna</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>NIT</th>
                                <th>Kelas</th>
                                <th>Prodi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($siswa as $row) {
                            ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nit']; ?></td>
                                <td><?= $row['kelas']; ?></td>
                                <td><?= $row['prodi']; ?></td>
                                <td>
                                    <a title="Edit" href="<?php echo base_url('siswa/edit/' . $row['id_siswa']) ?>"
                                        class="btn btn-info">Edit</a>
                                    <a title="Delete" href="<?php echo base_url('siswa/delete/' . $row['id_siswa']) ?>"
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