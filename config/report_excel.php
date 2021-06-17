<?php
	//membuka koneksi ke database
	include "koneksi.php";
	//memanggil library
	require 'assets/vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	//menuliskan nama kolom
	$spreadsheet=new spreadsheet();
	$sheet=$spreadsheet->getActiveSheet();
	$sheet->setCellValue('F1','PENERIMA BLT 2021 KELURAHAN WONOKROMO');
	$sheet->setCellValue('A2','No');
	$sheet->setCellValue('B2','NIK');
	$sheet->setCellValue('C2','Nama Lengkap');
	$sheet->setCellValue('D2','Tempat Lahir');
	$sheet->setCellValue('E2','Tanggal Lahir');
	$sheet->setCellValue('F2','Jenis Kelamin');
	$sheet->setCellValue('G2','Alamat');
	$sheet->setCellValue('H2','RT');
	$sheet->setCellValue('I2','RW');
	$sheet->setCellValue('J2','Pekerjaan');
	$sheet->setCellValue('K2','Pendapatan');
	$sheet->setCellValue('L2','Jumlah Tanggungan');


	//mengambil data pada database dan menuliskan di excel
	$query=mysqli_query($koneksi,"SELECT warga.*, pekerjaan.NAMA_PEKERJAAN, pendapatan.RANGE_PENDAPATAN FROM warga, pekerjaan, pendapatan WHERE warga.KODE_PEKERJAAN=pekerjaan.KODE_PEKERJAAN and warga.GOL_PENDAPATAN=pendapatan.GOL_PENDAPATAN");
	$i=3;
	$no=1;
	while($row=mysqli_fetch_array($query)){
		$sheet->setCellValue('A'.$i,$no++);
		$sheet->setCellValue('B'.$i,$row['NIK']);
		$sheet->setCellValue('C'.$i,$row['NAMA_WARGA']);
		$sheet->setCellValue('D'.$i,$row['TEMPAT_LAHIR']);
		$sheet->setCellValue('E'.$i,$row['TANGGAL_LAHIR']);
		$sheet->setCellValue('F'.$i,$row['JKEL']);
		$sheet->setCellValue('G'.$i,$row['ALAMAT']);
		$sheet->setCellValue('H'.$i,$row['RT']);
		$sheet->setCellValue('I'.$i,$row['RW']);
		$sheet->setCellValue('J'.$i,$row['NAMA_PEKERJAAN']);
		$sheet->setCellValue('K'.$i,$row['RANGE_PENDAPATAN']);
		$sheet->setCellValue('L'.$i,$row['JUMLAH_TANGGUNGAN']);
		$i++;
	}

	//style
	$styleArray=[
				'borders'=>[
					'allBorders'=>[
						'borderStyle'=>PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
				],
	];

	//memunculkan file excel
	$i=$i-1;
	$sheet->getStyle('A2:L'.$i)->applyFromArray($styleArray);
	$writer=new Xlsx($spreadsheet);
	$writer->save('PENERIMA BLT 2021 KELURAHAN WONOKROMO.xlsx');
	echo "<script>document.location='?halaman=data_warga';</script>";
?>