<?php 
session_start();
$session = $_SESSION['login'];
require 'controller/fungsi.php';

$id = $_GET['id'];

$query = mysqli_query($db, "SELECT * FROM tb_berita INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_berita.kategori_id WHERE id_berita='$id'");
$query2 = mysqli_query($db, "SELECT * FROM tb_kategori");
$fetch = mysqli_fetch_assoc($query);

$fetch2 = mysqli_fetch_assoc($query2);

if (isset($_POST['edit'])) {
    if (edit($_POST) > 0) {
        echo "<script>
        alert('News Successfully edit');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo "<script>
        alert('Edit Fail');
        document.location.href = 'index.php';
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
<body class="bg-main" >
    <div class="bg-white p-10 w-[50%] mx-auto text-center">
        <h1 class="font-bold text-3xl" >Edit News</h1>
        <form action="" method="post" enctype="multipart/form-data" class="flex flex-col justify-center gap-10 mt-5" >
            <input type="hidden" name="id" value="<?= $fetch['id_berita']; ?>">
            <input type="hidden" name="gambarOld" value="<?= $fetch['gambar_berita'] ?>">
            <input type="text" name="penulis_berita" class="p-4 border cursor-default border-black rounded-xl" value="<?= $session; ?>" readonly required>
            <input type="text" name="judul_berita" class="p-4 border border-black rounded-xl" value="<?= $fetch['judul_berita']; ?>" placeholder="judul berita" autocomplete="off" required >
            <textarea name="isi_berita" id="" rows="10" placeholder="Isi berita" required class="p-4 border border-black rounded-xl" ><?= $fetch['isi_berita'] ?></textarea>
            <img src="img/<?= $fetch['gambar_berita'] ?>" alt="" class="rounded-xl w-1/2 mx-auto" >
            <input type="file" class="p-4 border border-black rounded-xl" name="gambar_berita" id="" >
            <select name="kategori_berita" class="p-4 border border-black rounded-xl" id="" required >
                <option disabled >--select category--</option>
                <option value="<?= $fetch['kategori_id']; ?>"><?= $fetch['nama_kategori']; ?></option>
                <?php foreach($query2 as $row): ?>
                    <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="bg-main p-3 text-xl font-bold text-white rounded-xl" name="edit">Edit</button>   
            
        </form>
    </div>
</body>
</html>