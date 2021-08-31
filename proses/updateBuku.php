<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
            
    mysqli_query($db, "UPDATE buku SET judul=\"$judul\", penulis=\"$penulis\", penerbit=\"$penerbit\", tahun_terbit=\"$tahun\" WHERE id_buku='$id'");
    header("location:../pages/Buku.php?pesan=update");

?>