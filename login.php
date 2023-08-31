<?php 
// koneksiin ke database membaca session
session_start();
require './controller/fungsi.php';

// baca session
if (isset($_SESSION['login'])) {
    header('location:index.php');
}

// login logic
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['nama_pengguna']);
    $password = mysqli_real_escape_string($db, $_POST['password_pengguna']);

    // jalankan query dan pengecekan data
    $login = mysqli_query($db, "SELECT * FROM tb_users WHERE nama_pengguna='$username'");

    // pengecekan password
    if (mysqli_num_rows($login)===1) {
        $verif = mysqli_fetch_assoc($login);
        if ($password==$verif['password_pengguna']) {
            // set session
            $_SESSION['login'] = $username;
            echo "<script>
                alert('Selamat datang di portal web');
                document.location.href='index.php';
            </script>";
            exit;
        }
    }
    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 1</title>
    <!-- link ke css sendiri -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- form login -->
    <div class="login">
        <h1>LOGIN FORM</h1>
        <form action="" method="post">
            <input type="text" name="nama_pengguna" placeholder="username">
            <input type="password" name="password_pengguna" placeholder="password">
            <button type="submit" name="login">Login</button>
            <?php if(isset($error)): ?>
                <p style="color: red; font-style:italic;">username/password salah</p>
            <?php endif; ?>    
            <a href="register.php">Belum punya akun? Daftar sekarang</a>
        </form>
    </div>
</body>
</html>