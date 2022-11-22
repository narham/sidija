<?= $this->extend('layout/tem_laporan'); ?>
<?= $this->Section('page'); ?>

<h2>DATA LOGBOOK</h2>
<a href="<?php echo base_url() ?>/laporan/print">
    Download PDF
</a>
<div>
    <a href="<?= base_url(); ?>/admin" class="btn btn-primary"><i class="fa fa-backward" aria-hidden="true"
            Kembali>Kembali</i></a>
    <a href="" class="btn btn-primary"><i class="fa fa-download text text-center" aria-hidden="true">Download</i></a>
</div>

<h3>ABSEN TARUNA</h3>





<table border=1 width=75% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:left">
    <thead>
        <tr>
            <th width>NO</th>
            <th>NAMA TARUNA</th>
            <th>COURSE</th>
            <th>KETERANGAN</th>

        </tr>
    </thead>
    <?php
    if (count($jaga) > 0) {
        foreach ($jaga as $index => $data) {
    ?>
    <tr>
        <td><?= $data['nit'] ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['kelas'] ?></td>
        <td><?= $data['keterangan'] ?></td>

    </tr>
    <?php
        }
    }
    ?>


    <tbody>


    </tbody>
</Table>

<?= $this->endSection(); ?>