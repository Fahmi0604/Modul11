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
        <!-- cek apakah sudah login -->
        <h1>Tambah Data Anggota</h1>
        <form action="../proses/insertAnggota.php" method="post" enctype="multipart/form-data">
            <h4>Nama</h4>
            <input name="nama" type="text">
            <h4 style="margin-bottom: 2.5%">Jenis Kelamin</h4>
            <div>
                <input type="radio" id="laki-laki" name="gender" value="laki-laki"> 
                <label for="laki-laki">Laki-Laki</label>
            </div>
            <div style="margin-bottom: 2.5%">
                <input type="radio" id="perempuan" name="gender" value="perempuan">
                <label for="perempuan">Perempuan</label>
            </div>
            <h4>Alamat</h4>
            <textarea name="alamat" id="alamat" cols="30" rows="5"></textarea>

            <h4>Foto</h4>
            <input type="file" name="foto" id="foto">
            <input type="submit" onclick="return confirm('Apakah yakin data akan disimpan ?')" value="Simpan">
        </form>
        
    </main>
    
    <?php 
        include 'component/footer.php';
    ?>
</body>
</html>