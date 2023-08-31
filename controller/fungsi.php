<?php 
$db = mysqli_connect("localhost", "root", "", "percobaan");


function upload(){
    $namaFile = $_FILES['gambar_berita']['name'];
    $ukuranFile = $_FILES['gambar_berita']['size'];
    $error = $_FILES['gambar_berita']['error'];
    $tmpName = $_FILES['gambar_berita']['tmp_name'];  
    
    if ($error===4) {
        echo "<script>
    alert('Gambar harus diupload dahulu!');
    </script>";
    return false;
    }

    $ekstensiGambar = ['jpg', 'png', 'jpeg'];
    $ekstensi = explode('.', $namaFile);
    $ekstensi = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensi, $ekstensiGambar)) {
        echo "<script>
    alert('Ekstensi gambar tidak valid');
    </script>";
    return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensi;

    move_uploaded_file($tmpName, 'img/'. $namaFile);

    return $namaFile;
}

// function insert
function insert($data){
    global $db;
    $author = mysqli_real_escape_string($db, $data['penulis_berita']);
    $title = mysqli_real_escape_string($db, $data['judul_berita']);
    $isi = mysqli_real_escape_string($db, $data['isi_berita']);


    $kategori = $data['kategori_berita'];

    // upload gambar
    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $insert = mysqli_query($db, "INSERT INTO tb_berita VALUES ('','$title','$isi','$gambar','$author','$kategori')");

    return mysqli_affected_rows($db);
}

function edit($data) {
    global $db;

    $id = $data['id'];
    $penulis = mysqli_real_escape_string($db, $data['penulis_berita']);
    $title = mysqli_real_escape_string($db, $data['judul_berita']);
    $isi = mysqli_real_escape_string($db, $data['isi_berita']);
    $kategori = $data['kategori_berita'];

    $gambarOld = $data['gambarOld'];

    

    if ($_FILES['gambar_berita']['error']===4) {
        $gambar = $gambarOld;
    }else{
        $gambar = upload();
    }
    $query = mysqli_query($db, "UPDATE tb_berita SET judul_berita='$title', isi_berita='$isi', gambar_berita='$gambar', penulis_berita='$penulis', kategori_berita='$kategori' WHERE id_berita='$id'");
    return mysqli_affected_rows($db);
}
?>