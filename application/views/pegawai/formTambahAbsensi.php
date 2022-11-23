<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom:100px">
        <div class="card-body">

            <?php
            $nik = $this->session->userdata('nik');
            $nama = $this->session->userdata('nama');
            ?>
            <form action="<?php echo base_url('PegawaiController/AbsensiPegawai/absensiAction') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama ?>">
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?php echo $nik ?>">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>


</div>