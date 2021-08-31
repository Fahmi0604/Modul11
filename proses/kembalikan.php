<?php 

    include 'koneksi.php';

    $id = $_GET['id'];

    $date = date('Y-m-d');
    $query = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'");

    while ($data = mysqli_fetch_assoc($query)) {

    mysqli_query($db, "UPDATE buku SET status='0' WHERE id_buku='$data[id_buku]' ");
    mysqli_query($db, "INSERT INTO pengembalian VALUES(0, '$date', '$data[tanggal_pinjam]', '$data[id_buku]', '$data[id_anggota]', '$data[id_petugas]', '0') ");
    mysqli_query($db, "DELETE FROM peminjaman WHERE id_peminjaman='$id' ");

    }

    header("location:../pages/Peminjaman.php?pesan=input"); 

?>