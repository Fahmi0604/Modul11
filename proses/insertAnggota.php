<?php 

    include 'koneksi.php';
    
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];

    if($foto != null) {
    
        $path = "../images/".$foto;
    
        if (move_uploaded_file($tmp_file,  $path)) {
            
            mysqli_query($db, "INSERT INTO anggota VALUES(0,'$nama','$gender','$alamat','$foto')");
            header("location:../pages/Anggota.php?pesan=input"); 
    
        } else {
            echo "Kemungkinan hacking!\n";
        }
    } else {
        header("location:../pages/Anggota.php?pesan=error"); 
    }

?>