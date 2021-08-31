<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <?php 
        session_start();
        if($_SESSION['status']=="login"){
            header("location:pages/Home.php");
        }
    ?>

	<form method="post" action="proses/cekLogin.php" onsubmit="return validation()">
		<div class="container">
            <div class="alert" id="alert">
                <?php 
                if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "gagal"){  
                        echo "Login gagal! username dan password salah!";         
                    } else if($_GET['pesan'] == "belum_login"){
                        echo "Anda harus login untuk mengakses halaman admin";
                    }
                } else { ?>
                    <script>
                        document.getElementById('alert').style.display = 'none';
                    </script>
            <?php 
                }
                ?>
                
            </div>
			<div class="form">
				<p>Username : </p>
				<input id="username" type="text" name="username" placeholder="Masukkan username">
				<p>Password : </p>
				<input id="password" type="password" name="password" placeholder="Masukkan password">
				<input type="submit" value="LOGIN">
			</div>
		</div>			
	</form>
</body>
<script src="js/script.js"></script>
</html>