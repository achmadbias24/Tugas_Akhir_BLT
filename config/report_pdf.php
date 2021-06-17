<?php
	//mengeksekusi file koneksi.php
	include "../config/koneksi.php";
	//mengeksekusi library dompdf
	require_once("../assets/dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	//membuat konstruktor
	$dompdf = new Dompdf();
	//membaca data dari database
	$query = mysqli_query($koneksi,"SELECT warga.*, pekerjaan.NAMA_PEKERJAAN, pendapatan.RANGE_PENDAPATAN FROM warga, pekerjaan, pendapatan WHERE warga.KODE_PEKERJAAN=pekerjaan.KODE_PEKERJAAN and warga.GOL_PENDAPATAN=pendapatan.GOL_PENDAPATAN");
	//membuat script html
	$html='<center><h3>Daftar Nama Warga Penerima BLT 2021<br>Kecamatan Wonokromo Kota Surabaya</h3></center><hr/><br/>';
	$html .='<table border="1" width="100%">
		<tr>
			<th>No</th>
			<th>NIK</th>
			<th>Nama Lengkap</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>RT</th>
			<th>RW</th>
			<th>Pekerjaan</th>
			<th>Pendapatan</th>
			<th>Jumlah Tanggungan</th>
		</tr>';
	$no=1;
	//menuliskan data pada script html
	while ($row=mysqli_fetch_array($query)) {
		$html.="<tr>
		<td>".$no."</td>
		<td>".$row['NIK']."</td>
		<td>".$row['NAMA_WARGA']."</td>
		<td>".$row['TEMPAT_LAHIR']."</td>
		<td>".$row['TANGGAL_LAHIR']."</td>
		<td>".$row['JKEL']."</td>
		<td>".$row['ALAMAT']."</td>
		<td>".$row['RT']."</td>
		<td>".$row['RW']."</td>
		<td>".$row['NAMA_PEKERJAAN']."</td>
		<td>".$row['RANGE_PENDAPATAN']."</td>
		<td>".$row['JUMLAH_TANGGUNGAN']."</td>
		</tr>";
		$no++;
	}
	$html.="</html>";
	$dompdf->loadHtml($html);
	//setting ukuran dan orientasi kertas
	$dompdf->setPaper('A4','landscape');
	//rendering dari HTML ke PDF
	$dompdf->render();
	//melakukan output ke file PDF
	$dompdf->stream('PENERIMA BLT 2021 KELURAHAN WONOKROMO.pdf');
?>