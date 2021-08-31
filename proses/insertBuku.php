<?php 

    include 'koneksi.php';
    
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    
    mysqli_query($db, "INSERT INTO buku VALUES(0,'$judul','$penulis','$penerbit','$tahun','0')");
    header("location:../pages/Buku.php?pesan=input"); 

?>