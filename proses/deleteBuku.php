<?php
include 'koneksi.php';

$id = $_GET['id'];

    mysqli_query($db, "DELETE FROM buku WHERE id_buku='$id'")or die(mysqli_error());
    header("location:../pages/Buku.php?pesan=delete");
?>