<?php 
error_reporting(0);
session_start();
$session = $_SESSION['login'];
require 'controller/fungsi.php';

$query = mysqli_query($db, "SELECT * FROM tb_berita INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_berita.kategori_id INNER JOIN tb_user ON tb_user.id_user = tb_berita.user_id");

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
<body >
    <!-- navbar -->
    <section class="flex justify-between items-center px-36 py-10 bg-main text-white fixed left-0 right-0 top-0">
        <h1 class="text-2xl font-bold">NEWS PORTAL</h1>
        <div class="flex items-center justify-center gap-10 font-semibold">
            <a href="index.php">Home</a>
            
            <?php if(!isset($session)){ ?>
                <a href="login.php" class="bg-blue-400 py-2 px-4 rounded-full hover:shadow-lg">Login</a>
            <?php }else { ?>
                <a href=""><?= $session; ?></a>
                <a href="logout.php" class="bg-blue-400 py-2 px-4 rounded-full hover:shadow-lg" >Log out</a>
            <?php } ?>
        </div>
    </section>

    <!-- hero -->
    <section class="px-36 py-10 my-36 text-center" id="home" >
        <h1 class="font-bold mx-auto text-main text-9xl w-[1000px] leading-relaxed" >Welcome to the News Portal</h1>
        <?php if(!isset($session)) { ?>
            <p class="text-3xl text-main font-semibold mt-10" >Haii you!</p>
        <?php }else{ ?>
            <p class="text-3xl text-main font-semibold mt-10" >Haii <?= $session; ?>!</p>
        <?php } ?>
    </section>
    <hr>

    <!-- daftar berita -->
    <section class="px-36 py-10 my-20" >
        <div class="flex justify-between items-center">
            <h2 class="text-4xl font-semibold" >Latest News</h2>
            <a href="insert.php" class="font-semibold border-2 border-black p-4 rounded-2xl" >Add News +</a>
        </div>
        <div class="mt-20 grid grid-cols-4 mx-auto gap-10" >
            <?php foreach($query as $rows): ?>
                <div class="hover:shadow-2xl transition duration-150 ease-in-out p-5 border-2 border-gray-400 rounded-xl flex flex-col justify-start gap-4" >
                    <h3 class="font-bold text-xl" ><?= $rows['judul_berita']; ?></h3>
                    <p><span class="font-bold" >Author:</span> <?= $rows['nama_user']; ?></p>
                    <img src="img/<?= $rows['gambar_berita']; ?>" alt="" class="w-full max-h-[400px] rounded-md" >
                    <p><span class="font-bold" >Tags: </span><?= $rows['nama_kategori'] ?></p>
                    
                    <div class="flex justify-between items-center mt-4" >
                        <a href="read.php?id=<?= $rows['id_berita']; ?>" class="underline text-main hover:text-red-600" >Read News</a>
                        <?php if(isset($session)) { ?>
                            <?php if($session==$rows['nama_user']) { ?>
                            <div class="flex items-center gap-4">
                                <a href="edit.php?id=<?= $rows['id_berita']; ?>" class="text-yellow-600" ><i class='bx bxs-message-alt-edit bx-sm' ></i></a>
                                <?php 
                                    echo "<a onClick=\"javascript:return confirm('Are you sure want to delete this?'); \" href='delete.php?id={$rows['id_berita']}' ><i class='bx bxs-trash bx-sm text-red-600'></i></a>";
                                ?>
                                
                            </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>