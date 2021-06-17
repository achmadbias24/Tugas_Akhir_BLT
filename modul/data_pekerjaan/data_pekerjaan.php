<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if(@$_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data
			$ubah = mysqli_query($koneksi, "UPDATE pekerjaan SET KODE_PEKERJAAN = '$_POST[kode_pekerjaan]',NAMA_PEKERJAAN = '$_POST[nama_pekerjaan]' where KODE_PEKERJAAN = '$_GET[id]' ");
			if($ubah)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=data_pekerjaan';
					  </script>";
			}
			else
			{
				echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=data_pekerjaan';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO pekerjaan VALUES ('$_POST[kode_pekerjaan]','$_POST[nama_pekerjaan]') ");
			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=data_pekerjaan';
					  </script>";
			}else
			{
				echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=data_pekerjaan';
					  </script>";
			}
		}
	}

	//Uji Jika klik tombol edit / hapus
	if(isset($_GET['hal']))
	{

		if($_GET['hal'] == "edit")
		{

			//tampilkan data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM pekerjaan WHERE KODE_PEKERJAAN='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$vkode_pekerjaan = $data['KODE_PEKERJAAN'];
				$vnama_pekerjaan = $data['NAMA_PEKERJAAN'];
			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM pekerjaan WHERE KODE_PEKERJAAN='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=data_pekerjaan';
					  </script>";
			}
		}
	}
?>
<div class="card mt-3 mb-3">
  <div class="card-header bg-info text-white ">
    Form Input Data Pekerjaan
  </div>
  <div class="card-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="kode_pekerjaan">Kode Pekerjaan</label>
	    <input type="text" class="form-control" id="kode_pekerjaan" name="kode_pekerjaan" value="<?=@$vkode_pekerjaan?>">
	  </div>
	  <div class="form-group">
	    <label for="nama_pekerjaan">Nama Pekerjaan</label>
	    <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" value="<?=@$vnama_pekerjaan?>">
	  </div>

	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    Data Pekerjaan
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>No</th>
    		<th>Kode Pekerjaan</th>
    		<th>Nama Pekerjaan</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "SELECT * from pekerjaan");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['KODE_PEKERJAAN']?></td>
    		<td><?=$data['NAMA_PEKERJAAN']?></td>
    		<td>
    			<a href="?halaman=data_pekerjaan&hal=edit&id=<?=$data['KODE_PEKERJAAN']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=data_pekerjaan&hal=hapus&id=<?=$data['KODE_PEKERJAAN']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>