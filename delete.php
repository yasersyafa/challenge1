<?php 
require 'controller/fungsi.php';

$id = $_GET['id'];

$query = mysqli_query($db, "DELETE FROM tb_berita WHERE id_berita='$id'");

if ($query) {
    echo "<script>
            alert('Successfully Delete');
            document.location.href='index.php';
        </script>";
}else {
    echo "<script>
            alert('Fail to delete');
            document.location.href='index.php';
        </script>";
}
?>