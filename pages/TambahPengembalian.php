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
        <h1>Pengembalian Buku</h1>

    <?php 
        include "../proses/koneksi.php";
        $query_mysql3 = mysqli_query($db, "SELECT id_admin, nama FROM admin")or die(mysqli_error());
        $query_mysql2 = mysqli_query($db, "SELECT a.id_anggota, a.nama FROM peminjaman as p INNER JOIN anggota as a ON p.id_anggota = a.id_anggota")or die(mysqli_error());
        $query_mysql = mysqli_query($db, "SELECT b.id_buku, b.judul FROM peminjaman as p INNER JOIN buku as b ON p.id_buku = b.id_buku")or die(mysqli_error());
    ?>

        <form action="../proses/insertPengembalian.php" method="post" enctype="multipart/form-data">
            <h4>Tanggal Pinjam</h4>
            <input name="tanggal_kembali" type="date">
            
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

            <h4>Denda</h4>
            <input name="denda" type="number">
            
            <!-- <input name="id_petugas" type="text"> -->
            <input type="submit" onclick="return confirm('Apakah yakin data akan disimpan ?')" value="Simpan">
        </form>
        
    </main>
    
    <?php 
        include 'component/footer.php';
    ?>
</body>
</html>