<?php
	include 'koneksi.php';
 
	echo "<option value=''>Pilih Siswa</option>";
 
	$query = "SELECT * FROM siswa";
	$siswa = $con->prepare($query);
	$siswa->execute();
	$res1 = $siswa->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_siswa'] . "'>" . $row['nama_siswa'] . "</option>";
	}
?>
