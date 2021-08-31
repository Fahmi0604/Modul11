<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];

if($foto != null){

    $path = "../images/".$foto;

    if (move_uploaded_file($tmp_file,  $path)) {
            
        mysqli_query($db, "UPDATE anggota SET nama=\"$nama\", jenis_kelamin=\"$gender\", alamat=\"$alamat\", foto='$foto' WHERE id_anggota='$id'");
        header("location:../pages/Anggota.php?pesan=update");

    } else {
        echo "Kemungkinan hacking!\n";
    }
}else {
    mysqli_query($db, "UPDATE anggota SET nama=\"$nama\", jenis_kelamin=\"$gender\", alamat=\"$alamat\" WHERE id_anggota='$id'");
    header("location:../pages/Anggota.php?pesan=update");
}



?>