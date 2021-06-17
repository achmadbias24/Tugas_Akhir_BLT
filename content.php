<?php

	@$halaman = $_GET['halaman'];

	if($halaman == "input_data_warga")
	{
		//tampil halaman input data warga
		include "modul/data_warga/data_warga.php";
	}
	elseif($halaman == "data_warga")
	{
		//tampil halaman data warga
		include "modul/data_warga/data.php";
	}
	elseif($halaman == "report_excel")
	{
		//mengakses file untuk cetak excel
		include "config/report_excel.php";
	}
	elseif($halaman == "grafik")
	{
		// tampil halaman grafik
		include "config/grafik.php";
	}
	elseif ($halaman == "data_pekerjaan"){
		//tampilkan halaman data pekerjaan
		include "modul/data_pekerjaan/data_pekerjaan.php";
	}
	elseif ($halaman == "gol_pendapatan"){
		//tampilkan halaman gol pendapatan
		include "modul/gol_pendapatan/gol_pendapatan.php";
	}
	
	elseif ($halaman == "keluar"){
		//tampilkan login
		include "logout.php";
	}
	else
	{
		//echo "Tampil Halaman Home";
		include "modul/home.php";
	}

?>