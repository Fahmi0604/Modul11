<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
    <link rel="stylesheet" href="../css/component.css">
    <link rel="stylesheet" href="../css/home.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script>
    $(document).ready(function(){
      $('.slider').bxSlider();
    });
    </script>

</head>
<body>
    
    <?php
        include 'component/header.php';
    ?>

    <main>
        <!-- cek apakah sudah login -->
        <?php 
            session_start();
            if($_SESSION['status']!="login"){
                header("location:../index.php?pesan=belum_login");
            }
             
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "welcome"){  
        ?>
                <script>
                    alert('Berhasil Login')
                </script>
        <?php 
                }
            }
        ?>

        <h1>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h1>
        <div class="slider">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bGlicmFyeXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="gambar">
            <img src="https://www.thirdandstate.org/sites/default/files/imagecache/node_image/iStock-487085486.jpg" alt="gambar">
        </div>
    </main>
    
    <?php 
        include 'component/footer.php'
    ?>
</body>
</html>