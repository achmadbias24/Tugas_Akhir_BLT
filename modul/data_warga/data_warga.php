<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
		{
			$username=$_SESSION['username'];
			//perintah simpan data baru
			//simpan data
			
			$simpan = mysqli_query($koneksi, "INSERT INTO warga 
											  VALUES (	'$_POST[nik]', 
											  		  	'$_POST[pekerjaan]',
											  		  	'$_POST[pendapatan]',
											  		  	$username,
											  		  	'$_POST[nama_warga]',
											  		  	'$_POST[tempat_lahir]',
											  		  	'$_POST[tanggal_lahir]',
											  		  	'$_POST[jenis_kelamin]',
											  		  	'$_POST[alamat_lengkap]',
											  		  	'$_POST[rt]',
											  		  	'$_POST[rw]',
											  		  	'$_POST[jumlah_tanggungan]'
											  		  ) ");
			if($simpan)
			{
				echo "<script>alert('Simpan Data SUKSES!!');
				document.location='?halaman=data_warga';</script>";
			}else
			{
				echo "<script>
						alert('Simpan Data GAGAL!!');
					  </script>";
			}	
	}
?>


<div class="card mt-3 mb-3">
  <div class="card-header bg-info text-white ">
    Form Input Data Warga
  </div>
  
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data" >
	  <div class="form-group">
	    <label for="nik">NIK (Nomor Induk Kependudukan)</label>
	    <input type="text" class="form-control" id="nik" name="nik">
	  </div>
	  <div class="form-group">
	    <label for="nama_warga">Nama</label>
	    <input type="text" class="form-control" id="nama_warga" name="nama_warga">
	  </div>
	  <div class="form-group">
	    <label for="tempat_lahir">Tampat Lahir</label>
	    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
	  </div>
	  <div class="form-group">
	    <label for="tanggal_lahir">Tanggal Lahir</label>
	    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
	  </div>
	  <div class="form-group">
	  	<label for="jenis_kelamin">Jenis Kelamin</label>
	    <div class="radio">
          	<input type="radio" name="jenis_kelamin" id="laki_laki" value="L"> Laki-laki
        </div>
        <div class="radio">
          	<input type="radio" name="jenis_kelamin" id="perempuan" value="P"> Perempuan
        </div>
	  </div>
	  <div class="form-group">
	    <label for="alamat_lengkap">Alamat Lengkap</label>
	    <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap">
	  </div>
	  <div class="form-group">
	    <label for="rt">RT</label>
	    <input type="text" class="form-control" id="rt" name="rt">
	  </div>
	  <div class="form-group">
	    <label for="rw">RW</label>
	    <input type="text" class="form-control" id="rw" name="rw">
	  </div>
	 <div class="form-group">
	    <label for="pekerjaan">Pekerjaan</label>
	   	<select class="form-control" name="pekerjaan">
	   		<option value="<?=@$vid_departemen?>"><?=@$vnama_departemen?></option>
	   		<?php
	   			$tampil = mysqli_query($koneksi, "SELECT * from pekerjaan order by NAMA_PEKERJAAN asc");
	   			while($data = mysqli_fetch_array($tampil)){
	   				echo "<option value = '$data[KODE_PEKERJAAN]'> $data[NAMA_PEKERJAAN] </option> ";
	   			}

	   		?>
	   	</select>
	  </div>
	  <div class="form-group">
	    <label for="pendapatan">Gol Pendapatan</label>
	   	<select class="form-control" name="pendapatan">
	   		<option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?></option>
	   		<?php
	   			$tampil = mysqli_query($koneksi, "SELECT * from pendapatan");
	   			while($data = mysqli_fetch_array($tampil)){
	   				echo "<option value = '$data[GOL_PENDAPATAN]'> $data[RANGE_PENDAPATAN] </option> ";
	   			}

	   		?>
	   	</select>
	  </div>
	  <div class="form-group">
	    <label for="jumlah_tanggungan">Jumlah Tanggungan</label>
	    <input type="text" class="form-control" id="jumlah_tanggungan" name="jumlah_tanggungan">
	  </div>
	  
	  <!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
		  Simpan
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Apakah Anda yakin untuk menyimpan data ini?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
  </div>
</div>