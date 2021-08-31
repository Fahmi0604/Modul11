<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
    <link rel="stylesheet" href="../css/component.css">
    <link rel="stylesheet" href="../css/anggota.css">
</head>
<body>

    <?php 
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../index.php?pesan=belum_login");
        }
    ?>
    
    <?php 
        include 'component/header.php';
    ?>

    <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "input"){  ?>
                <script>
                    alert('Data berhasil di input');
                </script>
    <?php   } else if($_GET['pesan'] == "error"){ ?>
                <script>
                    alert('Data gagal di inputkan');
                </script>
    <?php   } else if($_GET['pesan'] == "update") { ?>
                <script>
                    alert('Data berhasil di update');
                </script>
    <?php   } else if($_GET['pesan'] == "delete") { ?>
                <script>
                    alert('Data berhasil di delete');
                </script>
    <?php   }
        } ?>
    <main>
        <!-- cek apakah sudah login -->
        <h1>Data Transaksi Pengembalian Buku</h1>
        
        <div class="header-table">
            <div>
                <!-- <a class="btn-tambah" href="TambahPengembalian.php">Tambah Pengembalian</a> -->
                <!-- <a href="printLaporanAnggota.php"> <img src="../assets/printing.svg" alt="print"> </a> -->
            </div>
            <form action="Pengembalian.php" method="get">
            <input type="text" name="cari">
            <input type="submit" value="Cari">
            </form>
        </div>

        <table border="1">
        <tr>
            <th>No</th>
            <th>ID Pengembalian</th>
            <th>ID Petugas</th>  
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>    
            <th>Judul Buku</th>      
            <th>Nama Anggota</th>     
            <th>Status</th>        
            <!-- <th>Opsi</th> -->
        </tr>
        <?php 
            include '../proses/koneksi.php';
            $halaman = 10;
            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
            $result = mysqli_query($db, "SELECT * FROM pengembalian");
            $total = mysqli_num_rows($result);
            $pages = ceil($total/$halaman); 
            $no =$mulai+1;
            
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = mysqli_query($db, "select * from pengembalian as p INNER JOIN buku as b ON p.id_buku = b.id_buku INNER JOIN anggota as a ON p.id_anggota = a.id_anggota where judul like '%".$cari."%' OR nama like '%".$cari."%' LIMIT $mulai, $halaman")or die(mysqli_error);
            } else{
                $query = mysqli_query($db, "select * from pengembalian as p INNER JOIN buku as b ON p.id_buku = b.id_buku INNER JOIN anggota as a ON p.id_anggota = a.id_anggota LIMIT $mulai, $halaman")or die(mysqli_error);
            }
        
        
        while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>                  
                <td><?php echo $data['id_pengembalian']; ?></td> 
                <td><?php echo $data['id_petugas']; ?></td>
                <td><?php echo $data['tanggal_pinjam']; ?></td>             
                <td><?php echo $data['tanggal_pengembalian']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['status'] ? 'Belum Dikembalikan' : 'Dikembalikan' ?></td>
            </tr>
        
            <?php               
        } 
        ?>
        
        
        </table>          
        
        <div class="pagination">
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
            <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php } ?>
        
        </div>
    </main>
    
    <?php 
        include 'component/footer.php';
    ?>
</body>
</html>