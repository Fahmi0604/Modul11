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
        <h1>Data Transaksi Peminjaman Buku</h1>
        
        <div class="header-table">
            <div>
                <a class="btn-tambah" href="TambahPeminjaman.php">Tambah Peminjaman</a>
                <!-- <a href="printLaporanAnggota.php"> <img src="../assets/printing.svg" alt="print"> </a> -->
            </div>
            <form action="Peminjaman.php" method="get">
            <input type="text" name="cari">
            <input type="submit" value="Cari">
            </form>
        </div>

        <table border="1">
        <tr>
            <th>No</th>
            <th>ID Peminjaman</th>
            <!-- <th>ID Anggota</th>   -->
            <th>Nama</th>
            <!-- <th>ID Buku</th>    -->
            <th>Judul Buku</th>     
            <th>Tanggal Pinjam</th>         
            <th>Opsi</th>
        </tr>
        <?php 
            include '../proses/koneksi.php';
            $halaman = 10;
            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
            $result = mysqli_query($db, "SELECT * FROM peminjaman");
            $total = mysqli_num_rows($result);
            $pages = ceil($total/$halaman); 
            $no =$mulai+1;
            
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = mysqli_query($db, "select * from peminjaman as p INNER JOIN buku as b ON p.id_buku = b.id_buku INNER JOIN anggota as a ON p.id_anggota = a.id_anggota where judul like '%".$cari."%' OR nama like '%".$cari."%' LIMIT $mulai, $halaman")or die(mysqli_error());
            } else{
                $query = mysqli_query($db, "select p.id_peminjaman, p.tanggal_pinjam, a.nama, b.id_buku, a.id_anggota, b.judul from peminjaman as p INNER JOIN anggota as a ON p.id_anggota = a.id_anggota INNER JOIN buku as b ON p.id_buku = b.id_buku WHERE b.status = '1' ORDER BY p.id_peminjaman ASC LIMIT $mulai, $halaman")or die(mysql_error());
            }
        
        
        while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>                  
                <td><?php echo $data['id_peminjaman']; ?></td>    
                <!-- <td><?php echo $data['id_anggota']; ?></td>     -->
                <td><?php echo $data['nama']; ?></td>      
                <!-- <td><?php echo $data['id_buku']; ?></td> -->
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['tanggal_pinjam']; ?></td>
                
                <td style="padding: 2%">
                    <a style="text-decoration: none; background-color: #EF4444; color: white; padding: 2%;" href="../proses/kembalikan.php?id=<?php echo $data['id_peminjaman'];?>">Pengembalian</a>
                </td>
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