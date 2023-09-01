<?php 
require 'controller/fungsi.php';

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('Your registration successfully');
        document.location.href = 'login.php';
        </script>";
    }else {
        echo "<script>
        alert('Registration fail');
        document.location.href = 'register.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<body>
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
        <h1 class="font-bold text-center text-3xl" >REGISTER FORM</h1>
        <div class="mt-5" >
            <form action="" method="post" class="flex flex-col justify-center items-center gap-10">
                <input class="border-2 rounded-xl p-4 w-full" type="text" name="nama_pengguna" placeholder="username" required autocomplete="off" autofocus >
                <input class="border-2 rounded-xl p-4 w-full" type="password" name="password_pengguna" placeholder="password" required >
                <input class="border-2 rounded-xl p-4 w-full" type="password" name="password_pengguna2" placeholder="confirmation password" required >
                <button class="bg-main rounded-xl w-full p-3 text-white font-bold text-2xl" type="submit" name="register">Register</button> 
                <a href="login.php" class="font-semibold">Already have an account? <span class="text-main">click here</span></a>
            </form>
        </div>
    </div>
</body>
</html>
</body>
</html>