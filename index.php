<?php 
require 'controller/fungsi.php';

$query = mysqli_query($db, "SELECT * FROM tb_berita INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_berita.kategori_berita");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge</title>
    <link rel="stylesheet" href="css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="navbar">
        <h1 style="color: white;" >Portal Berita</h1>
        <form action="" method="get">
            <input type="search" name="search" id="" placeholder="search by kategori">
        </form>
    </div>
    <hr>
    <!-- daftar berita -->
    <div class="news">
        <div class="berita-flex" >
            <h2 class="md" style="color: white;" >Daftar Berita</h2>
            <a href="insert.php">Buat Berita +</a>
        </div>
        <!-- card view -->
        <div class="grid" >
            <?php
                foreach ($query as $rows) :
            ?>
            <div class="card">
                <h2><?= $rows['judul_berita']; ?></h2>
                <h4><span style="font-weight: 600;" >Penulis: </span>@<?= $rows['penulis_berita']; ?></h4>
                <img src="img/<?= $rows['gambar_berita']; ?>" alt="">
                <p><span style="font-weight: 600;">Kategori:</span> <?= $rows['nama_kategori'] ?></p>
                <div style="display: flex; justify-content:space-between; align-items:center;" >
                    <a href="read.php?id=<?= $rows['id_berita']; ?>">Read news</a>
                    <div class="option" >
                        <a href="delete.php?id=<?= $rows['id_berita']; ?>">
                            <i class='bx bx-trash bx-sm'></i>
                        </a>
                        <a href="edit.php?id=<?= $rows['id_berita']; ?>">
                            <i class='bx bxs-edit-alt bx-sm' ></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>