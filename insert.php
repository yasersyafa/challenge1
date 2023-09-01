<?php 
session_start();
$session = $_SESSION['login'];
require 'controller/fungsi.php';

if (!isset($session)) {
    echo "<script>
        alert('Please login first to add a news');
        document.location.href='index.php';
    </script>";
}

$query = mysqli_query($db, "SELECT * FROM tb_kategori");
$query2 = mysqli_query($db, "SELECT * FROM tb_user WHERE nama_user='$session'");
$fetch = mysqli_fetch_assoc($query2);

// if statement klo function insert dijalankan
if (isset($_POST['publish'])) {

    if (insert($_POST) > 0) {
        echo "<script>
        alert('berita berhasil di publikasi');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo "<script>
        alert('gagal publikasi');
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
    <div class="bg-white w-[50%] mx-auto text-center p-10">
        <h1 class="text-3xl font-bold" >Publish News</h1>
        <form action="" method="post" enctype="multipart/form-data" class="flex flex-col justify-center gap-10 mt-5" >
            <input type="hidden" name="id_user" value="<?= $fetch['id_user']; ?>">
            <input type="text" name="penulis_berita" required class="p-4 border cursor-default border-black rounded-xl" value="<?= $session; ?>" readonly >
            <input type="text" name="judul_berita" placeholder="Title" autocomplete="off" required class="p-4 border border-black rounded-xl" >
            <textarea name="isi_berita" id="" rows="10" placeholder="News ccontent" required class="p-4 border border-black rounded-xl" ></textarea>
            <input type="file" name="gambar_berita" id="" required class="border border-black p-4 rounded-xl" >
            <select name="kategori_berita" id="" required class="p-4 border border-black rounded-xl" >
                <option disabled >--select category--</option>
                <?php foreach($query as $row): ?>
                    <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="p-3 bg-main w-full text-white font-bold text-xl rounded-xl" name="publish">Publish</button>   
            
        </form>
    </div>
</body>
</html>