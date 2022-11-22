<?= $this->extend('layout/template'); ?>
<?= $this->Section('page'); ?>
<!--  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Managemen Prodi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $link; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Managemen Prodi</li>
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
                    <h3 class="card-title">DATABASE PRODI POLTEKBANG MAKASSAR</h3>

                    <div class="card-tools">
                        <?php
                        if (session()->get('status') == 0) : ?>
                        <a href="<?= base_url('prodi/add'); ?>" class="btn btn-primary">Tambah Prodi</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Prodi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($prodi as $row) {
                            ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row['prodi']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td>
                                    <a title="Edit" href="<?php echo base_url('prodi/edit/' . $row['id_prodi']) ?>"
                                        class="btn btn-info">Edit</a>
                                    <a title="Delete" href="<?php echo base_url('prodi/delete/' . $row['id_prodi']) ?>"
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