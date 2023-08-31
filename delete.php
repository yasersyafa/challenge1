<?php 
require 'controller/fungsi.php';

$id = $_GET['id'];

$query = mysqli_query($db, "DELETE FROM tb_berita WHERE id_berita='$id'");

if ($query) {
    echo "<script>
            alert('Berita berhasil dihapus');
            document.location.href='index.php';
        </script>";
}
?>