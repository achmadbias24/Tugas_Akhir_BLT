<?php
	//hapus session yang sudah di set
	unset($_SESSION['username']);
	unset($_SESSION['nama']);

	session_destroy();
	echo "<script>
			alert('Anda telah keluar dari Halaman Administrator');
			document.location='index.php';
		  </script>";
?>