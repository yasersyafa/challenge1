<?php 
require 'controller/fungsi.php';

$id = $_GET['id'];

$query = mysqli_query($db, "DELETE FROM tb_kategori WHERE id_kategori='$id'");

if ($query) {
    echo "<script>
            alert('Successfully Delete');
            document.location.href='category.php';
        </script>";
}else {
    echo "<script>
            alert('Fail to delete');
            document.location.href='category.php';
        </script>";
}
?>