<?php

session_start();
include 'koneksi.php';

//post
if(isset($_POST['nama_mahasiswa'])){
    $nama = $_POST['nama_mahasiswa'];
    $username = $_POST['username'];
    $program_studi = $_POST['program_studi'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $password = $_POST['password'];

    $excute = $koneksi -> query("INSERT INTO mahasiswa (nama_mahasiswa, username,program_studi, tahun_masuk, password) VALUES ('$nama','$username','$program_studi','$tahun_masuk','$password')");

    if($excute){
        echo "<script>
        alert('Berhasil menambahkan akun');
        window.location.href = 'login.php';
        </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST" class="form">
        <h1>Halaman Daftar</h1>

        <input type="text" name="nama_mahasiswa" placeholder="Masukkan Nama">
        <input type="text" name="program_studi" placeholder="Masukkan program studi">
        <input type="text" name="tahun_masuk" placeholder="Masukkan tahun masuk">
        <input type="username" name="username" placeholder="Masukkan username">
        <input type="password" name="password" placeholder="Masukkan password">
        <button type="submit">Daftar</button>
        <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
    </form>
</body>

</html>