<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style>
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h1>PT. INDONESIA BISA</h1>
            <h2>Laporan Kehadiran Pegawai</h2>
        </center>

        <?php
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulanTahun = $bulan . $tahun;
        ?>
        <table>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo $bulan ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo $tahun ?></td>
            </tr>
        </table>

        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Alfa</th>
            </tr>
            <?php $no = 1;
            foreach ($cetak_kehadiran as $c) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $c->nik ?></td>
                    <td><?php echo $c->nama_pegawai ?></td>
                    <td><?php echo $c->nama_jabatan ?></td>
                    <td><?php echo $c->hadir ?></td>
                    <td><?php echo $c->sakit ?></td>
                    <td><?php echo $c->alfa ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>

<script type="text/javascript">
    window.print();
</script>