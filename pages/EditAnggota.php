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
        $query_mysql = mysqli_query($db, "SELECT * FROM anggota WHERE id_anggota='$id'")or die(mysqli_error());

        while($data = mysqli_fetch_array($query_mysql)) { ?>

        <form action="../proses/updateAnggota.php" method="post" enctype="multipart/form-data">
            <h4>Nama</h4>
            <input type="hidden" name="id" value="<?php echo $data['id_anggota'] ?>">
            <input name="nama" type="text" value="<?php echo $data['nama'] ?>">
            <h4 style="margin-bottom: 2.5%">Jenis Kelamin</h4>
            <div>
                <input type="radio" id="laki-laki" name="gender" value="laki-laki" <?php echo ($data['jenis_kelamin']=='laki-laki')?'checked':'' ?>> 
                <label for="laki-laki">Laki-Laki</label>
            </div>
            <div style="margin-bottom: 2.5%">
                <input type="radio" id="perempuan" name="gender" value="perempuan" <?php echo ($data['jenis_kelamin']=='perempuan')?'checked':'' ?>>
                <label for="perempuan">Perempuan</label>
            </div>
            <h4>Alamat</h4>
            <textarea name="alamat" id="alamat" cols="30" rows="5"><?php echo $data['alamat'] ?></textarea>

            <h4>Foto</h4>
            <input type="file" name="foto" id="foto">
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