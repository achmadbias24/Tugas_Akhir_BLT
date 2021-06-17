<?php
include "config/koneksi.php";

//contoh login sederhana, bisa dikembang lagi
//menjalankan query ke database
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * from admin where USERNAME='$username' and PASSWORD='$password'";
$login=mysqli_query($koneksi,$sql);

//menngecek apakah uname dan pass ditemukan
$data=mysqli_fetch_array($login);
if ($data){
	//inisialisasi session
	session_start();
	$_SESSION['username'] = $data['USERNAME'];
	$_SESSION['nama'] = $data['NAMA_ADMIN'];
	header("location:admin.php");
}
else
{
	echo "<script>
			alert('Maaf, Login GAGAL, pastikan username dan password anda Benar..!');
			document.location='index.php';
		  </script>";
}

?>