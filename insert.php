<?php 
require 'controller/fungsi.php';

$query = mysqli_query($db, "SELECT * FROM tb_kategori");

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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login">
        <h1>Publish Berita</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="penulis_berita" placeholder="nama penulis" required>
            <input type="text" name="judul_berita" placeholder="judul berita" autocomplete="off" required >
            <textarea name="isi_berita" id="" rows="10" placeholder="Isi berita" required ></textarea>
            <input type="file" name="gambar_berita" id="" required >
            <select name="kategori_berita" id="" required >
                <option disabled >--select category--</option>
                <?php foreach($query as $row): ?>
                    <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="publish">Publish</button>   
            
        </form>
    </div>
</body>
</html>