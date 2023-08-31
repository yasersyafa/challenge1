<?php 
require 'controller/fungsi.php';

$id = $_GET['id'];
$query = mysqli_query($db, "SELECT * FROM tb_berita WHERE id_berita='$id'");

$fetch = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge</title>
    <link rel="stylesheet" href="css/styleread.css">
</head>
<body>
    <div class="page">
        <h1><?= $fetch['judul_berita']; ?></h1>
        
        <hr>
        <p>Penulis: <?= $fetch['penulis_berita']; ?></p>
        <img src="img/<?= $fetch['gambar_berita']; ?>" alt="" >
        <p><?= $fetch['isi_berita']; ?></p>
    </div>

</body>
</html>