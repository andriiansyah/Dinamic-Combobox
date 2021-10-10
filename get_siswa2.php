<?php

include 'koneksi.php';
$siswa = $_POST['siswa'];



$query = "SELECT * FROM siswa WHERE id_siswa=?";
$dewan1 = $con->prepare($query);
$dewan1->bind_param("i", $siswa);
$dewan1->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
    // echo "<input name='nama_siswa' value='".$row['nama_siswa']."'></input>";
    // echo $row['nama_siswa'];
    echo "<input name='nama_siswa' value='".$row['nama_siswa']."'></input>";
    echo "<input name='id_siswa' value='".$row['id_siswa']."'></input>";
}

?>