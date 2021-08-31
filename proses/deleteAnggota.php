<?php
include 'koneksi.php';

$id = $_GET['id'];
$nama;

$query_mysql = mysqli_query($db, "SELECT * FROM anggota WHERE id_anggota='$id'")or die(mysqli_error());

while($data = mysqli_fetch_array($query_mysql)){
    $nama = $data['foto']; 
    echo $nama;
}

if($nama != null){
    unlink("../images/".$nama);
}



mysqli_query($db, "DELETE FROM anggota WHERE id_anggota='$id'")or die(mysqli_error());
header("location:../pages/Anggota.php?pesan=delete");
?>