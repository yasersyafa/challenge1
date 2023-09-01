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
    $login = mysqli_query($db, "SELECT * FROM tb_user WHERE nama_user='$username'");

    // pengecekan password
    if (mysqli_num_rows($login)===1) {
        $verif = mysqli_fetch_assoc($login);
        if ($password==$verif['password_user']) {
            // set session
            $_SESSION['login'] = $username;
            echo "<script>
                alert('Login Succesfully');
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
    <link rel="stylesheet" href="dist/output.css">
    
</head>
<body class="bg-main">

    <!-- form login -->
    <div class="bg-white absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl p-10 flex flex-col justify-center w-1/3">
        <h1 class="font-bold text-center text-3xl" >LOGIN FORM</h1>
        <div class="mt-5" >
            <form action="" method="post" class="flex flex-col justify-center items-center gap-10">
                <input class="border-2 rounded-xl p-4 w-full" type="text" name="nama_pengguna" placeholder="username" required autocomplete="off" autofocus >
                <input class="border-2 rounded-xl p-4 w-full" type="password" name="password_pengguna" placeholder="password" required >
                <button class="bg-main rounded-xl w-full p-3 text-white font-bold text-2xl" type="submit" name="login">Login</button>
                <?php if(isset($error)): ?>
                    <p class="text-red-600 italic" >username/password salah</p>
                <?php endif; ?>    
                <a href="register.php" class="font-semibold">Don't have any account? <span class="text-main">click here</span></a>
            </form>
        </div>
    </div>
</body>
</html>