<?php 
session_start();
require 'controller/fungsi.php';
$session = $_SESSION['login'];

$verif = mysqli_query($db, "SELECT * FROM tb_user WHERE nama_user = '$session'");
$fetch = mysqli_fetch_assoc($verif);
if (!isset($session)) {
    echo "<script>alert('you need to login first');</script>";
    echo "<script>document.location.href='login.php';</script>";
    return false;
}
if ($fetch['role']=='user') {
    echo ("<script>alert('access denied')</script>");
    header('location: index.php');
    return false;
}

if (isset($_POST['addcat'])) {
    if (insertcategory($_POST) > 0) {
        echo "<script>
            alert('Add category is successfull');
            document.location.href='category.php';
        </script>";
    }else {
        echo "<script>
        alert('Add category is successfull');
        document.location.href='category.php';
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-main" >
<div class="fixed left-20 top-10" >
        <a href="category.php">
            <i class='bx bx-arrow-back bx-lg text-white' ></i>
        </a>
    </div>
    <div class="bg-white w-1/3 text-center p-10 h-fit rounded-xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <h1 class="text-3xl font-bold" >New Category</h1>
        <form action="" method="post" class="flex flex-col justify-center gap-10 mt-5" >
            <input type="text" name="nama_kategori" placeholder="Add Category" autocomplete="off" required class="p-4 border border-black rounded-xl" >
            <button type="submit" class="p-3 bg-main w-full text-white font-bold text-xl rounded-xl" name="addcat">Add</button>   
        </form>
    </div>
</body>
</html>