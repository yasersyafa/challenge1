<?php 
require 'controller/fungsi.php';

$id = $_GET['id'];

$query = mysqli_query($db, "SELECT * FROM tb_berita INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_berita.kategori_berita WHERE id_berita='$id'");
$query2 = mysqli_query($db, "SELECT * FROM tb_kategori");
$fetch = mysqli_fetch_assoc($query);

$fetch2 = mysqli_num_rows($query2);

if (isset($_POST['edit'])) {
    if (edit($_POST) > 0) {
        echo "<script>
        alert('berita berhasil di edit');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo "<script>
        alert('gagal edit berita');
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
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div class="login">
        <h1>Edit Berita</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $fetch['id_berita']; ?>">
            <input type="hidden" name="gambarOld" value="<?= $fetch['gambar_berita'] ?>">
            <input type="text" name="penulis_berita" value="<?= $fetch['penulis_berita']; ?>" placeholder="nama penulis" required>
            <input type="text" name="judul_berita" value="<?= $fetch['judul_berita']; ?>" placeholder="judul berita" autocomplete="off" required >
            <textarea name="isi_berita" id="" rows="10" placeholder="Isi berita" required ><?= $fetch['isi_berita'] ?></textarea>
            <img src="img/<?= $fetch['gambar_berita'] ?>" alt="">
            <input type="file" name="gambar_berita" id="" >
            <select name="kategori_berita" id="" required >
                <option disabled >--select category--</option>
                <option value="<?= $fetch['kategori_berita']; ?>"><?= $fetch['nama_kategori']; ?></option>
                <?php foreach($query2 as $row): ?>
                    <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="edit">Edit</button>   
            
        </form>
    </div>
</body>
</html>