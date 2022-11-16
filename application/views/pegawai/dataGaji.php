<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


    <table class="table table-striped table-bordered">
        <tr>
            <th>Bulan/Tahun</th>
            <th>Gaji Pokok</th>
            <th>Tj. Transportasi</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Cetak Slip</th>
        </tr>

        <?php foreach($gaji as $g) :  ?>
            <tr>
                <td><?php echo $g->bulan ?></td>
            </tr>
        <tr>
            <td></td>
        </tr>
        <?php endforeach; ?>
    </table>


</div>