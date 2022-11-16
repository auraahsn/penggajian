<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


    <div class="alert alert-success font-weight-bold mb-4" style="width: 50%">Selamat datang, Anda login sebagai pegawai!</div>

    <div class="card" style="margin-bottom: 30px">
    <div class="card-header font-weight-bold bg-primary text-white">
        Data Pegawai
    </div>

    <?php foreach($pegawai as $p) : ?>
    <div class="card-body">
        <div class="col-md-7">
            <table class="table">
                <tr>
                    <td>Nama Pegawai</td>
                    <td>:</td>
                    <td><?php echo $p->nama_pegawai ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?php echo $p->nik ?></td>
                </tr>
                <tr>
                    <td>Tanggal Masuk</td>
                    <td>:</td>
                    <td><?php echo $p->tanggal_masuk ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $p->status ?></td>
                </tr>
            </table>
        </div>
        <!-- <div class="col-md-5">

        </div> -->
    </div>
    <?php endforeach; ?>
    </div>


</div>