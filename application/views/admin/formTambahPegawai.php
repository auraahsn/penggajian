<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom:100px">
        <div class="card-body">
            <form action="<?php echo base_url('adminController/DataPegawai/addDataAction') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>ID Jabatan</label>
                    <input type="text" name="idJabatan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control">
                        <option value="">--Pilih Jabatan--</option>
                        <?php foreach ($jabatan as $j) : ?>
                            <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">--Pilih Status--</option>
                        <option value="pegawai_tetap">Pegawai Tetap</option>
                        <option value="pegawai_tidak_tetap">Pegawai Tidak Tetap</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>


</div>