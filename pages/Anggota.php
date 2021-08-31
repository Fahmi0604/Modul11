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
        <h1>Data Anggota</h1>
        
        <div class="header-table">
            <div>
                <a class="btn-tambah" href="TambahAnggota.php">Tambah Anggota</a>
                <a href="printLaporanAnggota.php"> <img src="../assets/printing.svg" alt="print"> </a>
            </div>
            <form action="Anggota.php" method="get">
            <input type="text" name="cari">
            <input type="submit" value="Cari">
            </form>
        </div>

        <table border="1">
        <tr>
            <th>No</th>
            <th>ID Anggota</th>
            <th>Nama</th>    
            <th>Foto</th>
            <th>Jenis Kelamin</th>      
            <th>Alamat</th>     
            <th>Opsi</th>          
        </tr>
        <?php 
            include '../proses/koneksi.php';
            $halaman = 10;
            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
            $result = mysqli_query($db, "SELECT * FROM anggota");
            $total = mysqli_num_rows($result);
            $pages = ceil($total/$halaman); 
            $no =$mulai+1;
            
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = mysqli_query($db, "select * from anggota where nama like '%".$cari."%' LIMIT $mulai, $halaman")or die(mysqli_error);
            } else{
                $query = mysqli_query($db, "select * from anggota LIMIT $mulai, $halaman")or die(mysqli_error);
            }
        
        
        while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>                  
                <td><?php echo $data['id_anggota']; ?></td>              
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo "<img src='../images/$data[foto]' width='100' height='100' />";?></td>
                <td><?php echo $data['jenis_kelamin']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td>
                    <a style="text-decoration: none; background-color: #38BDF8; color: white; padding: 2%;" href="printKartuAnggota.php?id=<?php echo $data['id_anggota']; ?>">Cetak Kartu</a> 
                    <a style="text-decoration: none; background-color: #EF4444; color: white; padding: 2%;" href="EditAnggota.php?id=<?php echo $data['id_anggota']; ?>">Edit</a> 
                    <a style="text-decoration: none; background-color: #FDE047; color: black; padding: 2%;" onclick="return confirm('Apakah yakin data akan dihapus?')" href="../proses/deleteAnggota.php?id=<?php echo $data['id_anggota']; ?>">Hapus</a>
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