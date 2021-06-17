<?php
include('koneksi.php');

if(isset($_GET['hal'])) {
	if($_GET['hal'] == "RW 1"){
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=01");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}elseif ($_GET['hal'] == "RW 2") {
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=02");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}elseif ($_GET['hal'] == "RW 3") {
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=03");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}elseif ($_GET['hal'] == "RW 4") {
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=04");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}elseif ($_GET['hal'] == "RW 5") {
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=05");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}elseif ($_GET['hal'] == "RW 6") {
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=06");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}elseif ($_GET['hal'] == "RW 7") {
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=07");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}elseif ($_GET['hal'] == "RW 8") {
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=08");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}elseif ($_GET['hal'] == "RW 9") {
		$q_rw = mysqli_query($koneksi,"SELECT DISTINCT RT FROM warga WHERE RW=09");
		while($row = mysqli_fetch_array($q_rw)){
			$nama_rt[] = $row['RT'];
			
			$query = mysqli_query($koneksi,"SELECT COUNT(RT) as jumlah from warga WHERE RT='".$row['RT']."'");
			$row = $query->fetch_array();
			$jumlah_warga[] = $row['jumlah'];
		}
	}
}
?>
<script src="assets/js/popper.min.js"></script> 
<div class="card mt-3 mb-3">
  <div class="card-header bg-info text-white">
    <div class="dropdown">
	  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Grafik Data Warga per RW
	  </button>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 1">RW 1</a>
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 2">RW 2</a>
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 3">RW 3</a>
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 4">RW 4</a>
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 5">RW 5</a>
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 6">RW 6</a>
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 7">RW 7</a>
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 8">RW 8</a>
	    <a class="dropdown-item" href="?halaman=grafik&hal=RW 9">RW 9</a>
	  </div>
	</div>
  </div>
  <div class="card-body" style="padding-left: 15%">
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>

	<script type="text/javascript" src="assets/Chart.js"></script>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_rt); ?>,
				datasets: [{
					label: 'Grafik Jumlah Penerima BLT pada RW',
					data: <?php echo json_encode($jumlah_warga); ?>,
					backgroundColor: 'rgba(0, 255, 255, 0.5)',
					borderColor: 'rgba(0,0,0,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
  </div>
</div>