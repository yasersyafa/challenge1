<?php 
error_reporting(0);
session_start();
require 'controller/fungsi.php';
$session = $_SESSION['login'];

$verif = mysqli_query($db, "SELECT * FROM tb_user WHERE nama_user = '$session'");
$fetch = mysqli_fetch_assoc($verif);
if (!isset($session)) {
    echo "<script>alert('you need to login first');</script>";
    echo "<script>document.location.href='login.php';</script>";
    return false;
}
if ($fetch['role']=='user') {
    echo ("<script>alert('access denied')</script>");
    header('location: index.php');
    return false;
}



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
<body>
    <!-- navbar -->
    <section class="flex justify-between items-center px-36 py-10 bg-main text-white">
        <h1 class="text-2xl font-bold"><a href="index.php">NEWS PORTAL</a></h1>
        <div class="flex items-center justify-center gap-10 font-semibold">
            <a href="admin.php">Post</a>
            <a href="category.php">Category</a>
            <a href="user.php">Users</a>
            <a href="logout.php" class="bg-blue-400 py-2 px-4 rounded-full hover:shadow-lg font-semibold" >Log out</a>
        </div>
    </section>

    <section>

    </section>

    <!-- table post -->
    <div class="px-36 py-10" >
        <a href="insert.php">
            <div class="flex justify-between items-center w-fit bg-main text-white p-3 absolute top-40 left-36" >
                <i class='bx bxs-news bx-md' ></i>
                <p class="font-bold text-xl" > Add News +</p>
            </div>
        </a>
        <table class="mt-40 mx-auto border-2 border-white" cellpadding="20" >
            <tr class="bg-main text-white" >
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php 
            $query = mysqli_query($db, "SELECT * FROM tb_berita INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_berita.kategori_id INNER JOIN tb_user ON tb_user.id_user = tb_berita.user_id");
            $no = 1;
            foreach ($query as $rows){
            ?>
            <tr class="text-center" >
                <td class="border border-r border-black" ><?= $no++ ?></td>
                <td class="border border-r border-black" ><img src="img/<?= $rows['gambar_berita']; ?>" width="80" height="55" alt=""></td>
                <td class="border border-r border-black" ><?= $rows['judul_berita']; ?></td>
                <td class="border border-r border-black" ><?= substr($rows['isi_berita'], 0, 45); ?>...</td>
                <td class="border border-r border-black" ><?= $rows['tanggal_berita']; ?></td>
                <td class="border border-r border-black" ><?= $rows['nama_kategori'] ?></td>
                <td class="border border-r border-black" ><a href="edit.php?id=<?= $rows['id_berita']; ?>" class="text-yellow-500" ><i class='bx bxs-credit-card-alt bx-md'></i></a></td>
                <td class="border border-r border-black" ><a onClick="javascript:return confirm('Are you sure want to delete this?');" href='delete.php?id=<?=$rows['id_berita']?>' class="text-red-600" ><i class='bx bxs-trash bx-md' ></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>