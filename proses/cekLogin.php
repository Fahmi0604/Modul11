<?php 
    session_start();

    include 'koneksi.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // echo 'username : '.$username.'<br>'.'password : '.$password.'<br>';

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $sql);
    $user = mysqli_num_rows($result);

    if($user > 0){ ?>
        <script>alert("Berhasil Login!")</script>
    <?php
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:../pages/Home.php?pesan=welcome");
    }
    else{
        header("location:../index.php?pesan=gagal");	
    }
?>