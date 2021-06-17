<div class="card mt-3" style="width: 105%;">
  <div class="card-header bg-info text-white ">
    Data Warga Penerima BLT 2021
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat Lengkap</th>
            <th>RT</th>
            <th>RW</th>
            <th>Pekerjaan</th>
            <th>Pendapatan</th>
            <th>Jumlah Tanggungan</th>
        </tr>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT warga.*, pekerjaan.NAMA_PEKERJAAN, pendapatan.RANGE_PENDAPATAN FROM warga, pekerjaan, pendapatan WHERE warga.KODE_PEKERJAAN=pekerjaan.KODE_PEKERJAAN and warga.GOL_PENDAPATAN=pendapatan.GOL_PENDAPATAN");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :

        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['NIK']?></td>
            <td><?=$data['NAMA_WARGA']?></td>
            <td><?=$data['TEMPAT_LAHIR']?></td>
            <td><?=$data['TANGGAL_LAHIR']?></td>
            <td><?=$data['JKEL']?></td>
            <td><?=$data['ALAMAT']?></td>
            <td><?=$data['RT']?></td>
            <td><?=$data['RW']?></td>
            <td><?=$data['NAMA_PEKERJAAN']?></td>
            <td><?=$data['RANGE_PENDAPATAN']?></td>
            <td><?=$data['JUMLAH_TANGGUNGAN']?></td>
        </tr>
    <?php endwhile; ?>
    </table>
    <a href="config/report_pdf.php"><button type="submit" class="btn btn-success">Ekspor Data ke PDF</button></a>
    <a href="?halaman=report_excel" class="btn btn-success" >Ekspor Data ke Excel</a>
    <a href="?halaman=grafik" class="btn btn-success" >Tampilkan Grafik</a>
  </div>
</div>