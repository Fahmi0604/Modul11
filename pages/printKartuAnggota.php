<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
            width: 50%;
            border: 1px solid gray;
            border-radius: 10px;
        }

        .card-header {
            background-color: #0275d8;
            color: white;
            border-radius: 10px 10px 0 0 ;
        }

        .card-header h4 {
            margin: 0;
            padding: 3%;
            text-align: center;
        }

        .card-body {
            padding: 3%;
            display: flex;
        }

        .img-c {
            display: flex;
            align-items: center;
            width: 50%
        }

        .form {
            width: 50%
            display: flex;
            flex-direction: column;
        }

        .form div {
            display: flex;
        }

        .form div p {
            margin-bottom: 0;
        }

    </style>
</head>
<body>
    <?php
        include "../proses/koneksi.php";
        $id = $_GET['id'];
        $query_mysql = mysqli_query($db, "SELECT * FROM anggota WHERE id_anggota='$id'")or die(mysqli_error());

        while($data = mysqli_fetch_array($query_mysql)) { ?>
        <div class="card">
            <div class="card-header" style="background-color: #0275d8; color: white; border-radius: 10px 10px 0 0 ;">
                <h4>KARTU ANGGOTA PERPUSTAKAAN</h4>
            </div>
            <div class="card-body">
                <div class="img-c">
                    <?php echo "<img src='../images/$data[foto]' alt='gambar' width='100' height='100' />" ?>
                </div>

                <div class="form">
                    <div>
                        <p>ID Anggota </p>
                        <p>: <?php echo $data['id_anggota'] ?></p>
                    </div>
                    <div>
                        <p>Nama </p>
                        <p>: <?php echo $data['nama'] ?></p>
                    </div>
                    <div>
                        <p>Jenis Kelamin </p>
                        <p>: <?php echo $data['jenis_kelamin'] ?></p>
                    </div>
                    <div>
                        <p>Alamat </p>
                        <p>: <?php echo $data['alamat'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php   
        } ?>   
    
    <script>
        window.print();
    </script>
</body>
</html>