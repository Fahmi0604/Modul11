<?php 

    include 'koneksi.php';
    
    $tgl_pinjam = $_POST['tanggal_pinjam'];
    $id_buku = $_POST['buku-opt'];
    $id_anggota = $_POST['anggota-opt'];
    $id_petugas = $_POST['admin-opt'];
    
    mysqli_query($db, "INSERT INTO peminjaman VALUES(0,'$tgl_pinjam','$id_buku','$id_anggota','$id_petugas') ");
    mysqli_query($db, "UPDATE buku SET status='1' WHERE id_buku='$id_buku' ");
    header("location:../pages/Peminjaman.php?pesan=input"); 

?>