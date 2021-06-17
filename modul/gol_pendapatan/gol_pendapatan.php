<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if($_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data
			$ubah = mysqli_query($koneksi, "UPDATE pendapatan SET GOL_PENDAPATAN = '$_POST[gol_pendapatan]',RANGE_PENDAPATAN = '$_POST[range_pendapatan]' where GOL_PENDAPATAN = '$_GET[id]' ");
			if($ubah)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=gol_pendapatan';
					  </script>";
			}else{
				echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=gol_pendapatan';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO pendapatan VALUES ('$_POST[gol_pendapatan]','$_POST[range_pendapatan]') ");
			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=gol_pendapatan';
					  </script>";
			}else{
				echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=gol_pendapatan';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM pendapatan where GOL_PENDAPATAN='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$vgol_pendapatan = $data['GOL_PENDAPATAN'];
				$vrange_pendapatan = $data['RANGE_PENDAPATAN'];
			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM pendapatan WHERE GOL_PENDAPATAN='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=gol_pendapatan';
					  </script>";
			}
		}
	}
?>
<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    Form Input Golongan Pendapatan
  </div>
  <div class="card-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="gol_pendapatan">Golongan Pendapatan</label>
	    <input type="text" class="form-control" id="gol_pendapatan" name="gol_pendapatan" value="<?=@$vgol_pendapatan?>">
	  </div>
	  <div class="form-group">
	    <label for="range_pendapatan">Range Pendapatan</label>
	    <input type="text" class="form-control" id="range_pendapatan" name="range_pendapatan" value="<?=@$vrange_pendapatan?>">
	  </div>
	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div>

<div class="card mt-3 mb-">
  <div class="card-header bg-info text-white ">
    Data Range Pendapatan
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>No</th>
    		<th>Golongan Pendapatan</th>
    		<th>Range Pendapatan</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "SELECT * from pendapatan");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :
    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['GOL_PENDAPATAN']?></td>
    		<td><?=$data['RANGE_PENDAPATAN']?></td>
    		<td>
    			<a href="?halaman=gol_pendapatan&hal=edit&id=<?=$data['GOL_PENDAPATAN']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=gol_pendapatan&hal=hapus&id=<?=$data['GOL_PENDAPATAN']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>