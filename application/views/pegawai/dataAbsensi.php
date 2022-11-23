<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <a class="btn btn-sm btn-success mb-3 mt-2" href="<?php echo base_url('PegawaiController/AbsensiPegawai/absensiAdd') ?>">Lakukan Absensi</a> 

    <table class="table table-bordered table-striped">
        <tr>
            <td class="text-center">No</td>
            <td class="text-center">Nama</td>
            <td class="text-center">Keterangan</td>
        </tr>

        <?php $no = 1;
        foreach ($absensi as $a) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $a->nama ?></td>
                <td>
                    <?php echo $a->keterangan ?>
                    <div class="text-gray"><small><?= $a->created_at ?><small></div>
                </td>
                <td>
                    <center>
                        <!-- <a class="btn btn-sm btn-warning" href="<?php echo base_url('adminController/potGaji/updateData/' . $p->id_pot_gaji) ?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" class="btn btn-sm btn-danger" href="<?php echo base_url('adminController/potGaji/deleteData/' . $p->id_pot_gaji) ?>"><i class="fas fa-trash"></i></a> -->
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


</div>