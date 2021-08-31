<?php 

    include 'koneksi.php';
    
    $tgl_kembali = $_POST['tanggal_kembali'];
    $denda = $_POST['denda'];
    $id_buku = $_POST['buku-opt'];
    $id_anggota = $_POST['anggota-opt'];
    $id_petugas = $_POST['admin-opt'];
    
    mysqli_query($db, "INSERT INTO pengembalian VALUES(0,'$tgl_kembali','$denda','$id_buku','$id_anggota','$id_petugas') ");
    header("location:../pages/Pengembalian.php?pesan=input"); 

?>