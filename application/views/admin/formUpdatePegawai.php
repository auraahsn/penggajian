<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom:100px">
        <div class="card-body">
            <?php foreach ($pegawai as $p) : ?>
                <form action="<?php echo base_url('adminController/DataPegawai/updateDataAction') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $p->id_pegawai ?>">
                        <input type="number" name="nik" class="form-control" value="<?php echo $p->nik ?>">
                    </div>

                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" class="form-control" value="<?php echo $p->nama_pegawai ?>">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $p->username ?>">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $p->password ?>">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="<?php echo $p->jenis_kelamin ?>"><?php echo $p->jenis_kelamin ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                    <label>ID Jabatan</label>
                    <input type="text" name="id_jabatan" class="form-control">
                </div> -->

                    <!-- <div class="form-group">
                        <label>ID Kehadiran</label>
                        <input type="text" name="id_kehadiran" class="form-control" value="<?php echo $p->id_kehadiran ?>">
                    </div> -->

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="id_jabatan" class="form-control">
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?php echo $j->id_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $p->tanggal_masuk ?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="<?php echo $p->status ?>"><?php echo $p->status ?></option>
                            <option value="Pegawai Tetap">Pegawai Tetap</option>
                            <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Hak Akses</label>
                        <select name="hak_akses" class="form-control">
                            <option value="<?php echo $p->hak_akses ?>">
                            <?php if($p->hak_akses=='1'){
                                echo "Admin";
                            }else{
                                echo "Pegawai";
                            } ?>
                            </option>
                            <option value="1">Admin</option>
                            <option value="2">Pegawai</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
            <?php endforeach; ?>
        </div>
    </div>


</div>