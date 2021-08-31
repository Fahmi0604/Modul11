<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
    <link rel="stylesheet" href="../css/component.css">
    <link rel="stylesheet" href="../css/tambahAnggota.css">
</head>
<body>
    
    <?php 
        include 'component/header.php';
    ?>
    
    <main>
        <h1>Edit Data Anggota</h1>

    <?php
        include "../proses/koneksi.php";
        $id = $_GET['id'];
        $query_mysql = mysqli_query($db, "SELECT * FROM buku WHERE id_buku='$id'")or die(mysqli_error());

        while($data = mysqli_fetch_array($query_mysql)) { ?>

        <form action="../proses/updateBuku.php" method="post" enctype="multipart/form-data">
            <h4>Judul Buku</h4>
            <input type="hidden" name="id" value="<?php echo $data['id_buku'] ?>">
            <input name="judul" type="text" value="<?php echo $data['judul'] ?>">
            
            <h4 style="margin-bottom: 2.5%">Penulis Buku</h4>
            <input name="penulis" type="text" value="<?php echo $data['penulis'] ?>">

            <h4>Penerbit Buku</h4>
            <input name="penerbit" type="text" value="<?php echo $data['penerbit'] ?>">

            <h4>Tahun Terbit</h4>
            <input name="tahun_terbit" type="text" value="<?php echo $data['tahun_terbit'] ?>">
            <input type="submit" onclick="return confirm('Apakah yakin data akan diupdate ?')" value="Simpan">
        </form>
    <?php 
        } 
    ?>    
    </main>
    
    <?php 
        include 'component/footer.php';
    ?>
</body>
</html>