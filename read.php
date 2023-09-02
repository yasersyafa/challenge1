<?php 
require 'controller/fungsi.php';

$id = $_GET['id'];
$query = mysqli_query($db, "SELECT * FROM tb_berita INNER JOIN tb_user ON tb_user.id_user = tb_berita.user_id INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_berita.kategori_id WHERE tb_berita.id_berita='$id'");

$fetch = mysqli_fetch_assoc($query);
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
    <div class="absolute left-20 top-10" >
        <a href="index.php#post">
            <i class='bx bx-arrow-back bx-lg text-white' ></i>
        </a>
    </div>
    <div class="w-1/2 bg-white p-10 mx-auto h-screen overflow-y-auto">
        <h1 class="font-bold text-3xl text-center my-5" ><?= $fetch['judul_berita']; ?></h1>
        
        <hr>
        <p class="text-xl my-5" ><span class="font-semibold" >Author:</span> <?= $fetch['nama_user']; ?> News Portal</p>
        <p class="text-xl my-5" ><span class="font-semibold" >Date: </span><?= $fetch['tanggal_berita'] ?></p>
        <img src="img/<?= $fetch['gambar_berita']; ?>" alt="" class="my-5" >
        <p class="my-5 text-xl" ><?= $fetch['isi_berita']; ?></p>
    </div>

</body>
</html>