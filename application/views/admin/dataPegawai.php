<div class="container-fluid" style="margin: bottom 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('adminController/DataPegawai/addData') ?>"><i class="fas fa-plus">  Tambah Pegawai</i></a>

    <table class="table table-stripted table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Hak Akses</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no = 1;
        foreach ($pegawai as $p) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $p->nik ?></td>
                <td><?php echo $p->nama_pegawai ?></td>
                <td><?php echo $p->jenis_kelamin ?></td>
                <td><?php echo $p->nama_jabatan ?></td>
                <td><?php echo $p->tanggal_masuk ?></td>
                <td><?php echo $p->status ?></td>
                    <?php if($p->hak_akses=='1') { ?>
                        <td>Admin</td>
                        <?php } else{ ?>
                            <td>Pegawai</td>
                        <?php } ?>
                
                <td>
                    <center>
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url('adminController/DataPegawai/updateData/'.$p->id_pegawai) ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" class="btn btn-sm btn-danger" href="<?php echo base_url('adminController/dataPegawai/deleteData/'. $p->id_pegawai) ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


</div>