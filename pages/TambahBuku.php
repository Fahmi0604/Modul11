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
        <h1>Tambah Data Buku</h1>
        <form action="../proses/insertBuku.php" method="post" enctype="multipart/form-data">
            <h4>Judul Buku</h4>
            <input name="judul" type="text">
            
            <h4 style="margin-bottom: 2.5%">Penulis Buku</h4>
            <input name="penulis" type="text">
            
            <h4>Penerbit Buku</h4>
            <input name="penerbit" type="text">

            <h4>Tahun Terbit</h4>
            <input name="tahun_terbit" type="text">
            <input type="submit" onclick="return confirm('Apakah yakin data akan disimpan ?')" value="Simpan">
        </form>
        
    </main>
    
    <?php 
        include 'component/footer.php';
    ?>
</body>
</html>