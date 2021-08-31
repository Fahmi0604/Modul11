<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
    <link rel="stylesheet" href="../css/component.css">
    <link rel="stylesheet" href="../css/tambahAnggota.css">

    <style>
        form input, form select {
            height: 4vh;
            margin: 2.5% 0;
        }
    </style>
</head>
<body>
    
    <?php 
        include 'component/header.php';
    ?>
    
    <main>
        <!-- cek apakah sudah login -->
        <h1>Peminjaman Buku</h1>

    <?php 
        include "../proses/koneksi.php";
        $query_mysql = mysqli_query($db, "SELECT id_buku, judul FROM buku WHERE status='0'")or die(mysqli_error());
        $query_mysql2 = mysqli_query($db, "SELECT id_anggota, nama FROM anggota")or die(mysqli_error());
        $query_mysql3 = mysqli_query($db, "SELECT id_admin, nama FROM admin")or die(mysqli_error());
    ?>

        <form action="../proses/insertPeminjaman.php" method="post" enctype="multipart/form-data">
            <h4>Tanggal Pinjam</h4>
            <input name="tanggal_pinjam" type="date">

            <h4>Anggota</h4>
            <select name="anggota-opt">
            <?php while($row = mysqli_fetch_assoc($query_mysql2)) { ?>
                <option value="<?php echo $row['id_anggota']; ?>"><?php echo $row['nama']; ?></option>
            <?php
                }
            ?>
            </select>
            
            <h4>Buku</h4>
            <select name="buku-opt">
            <?php while($row = mysqli_fetch_assoc($query_mysql)) { ?>
                <option value="<?php echo $row['id_buku']; ?>"><?php echo $row['judul']; ?></option>
            <?php
                }
            ?>
            </select>
            

            <h4>Petugas</h4>
            <select name="admin-opt">
            <?php while($row = mysqli_fetch_assoc($query_mysql3)) { ?>
                <option value="<?php echo $row['id_admin']; ?>"><?php echo $row['nama']; ?></option>
            <?php
                }
            ?>
            </select>
            
            <!-- <input name="id_petugas" type="text"> -->
            <input type="submit" onclick="return confirm('Apakah yakin data akan disimpan ?')" value="Simpan">
        </form>
        
    </main>
    
    <?php 
        include 'component/footer.php';
    ?>
</body>
</html>