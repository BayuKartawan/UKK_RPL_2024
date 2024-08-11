<?php

session_start();
include '../koneksi.php';
// ini untuk method POST
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $excute = $koneksi->query("INSERT INTO mahasiswa (nama, username, password) VALUES ('$nama', '$username', '$password')");

    if ($excute) {
        echo "<script>
        alert('Regsiter berhasil');
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
    <link rel="stylesheet" href="../style/register.css">
    <title>Halaman Register</title>
</head>

<body>


    <form action="" method="POST" class="register-form">
        <h1>Halaman Register</h1>

        <input type="text" name="nama" placeholder="masukkan name">
        <input type="text" name="username" placeholder="masukkan username">
        <input type="password" name="password" placeholder="masukkan password">

        <button type="submit">Submit</button>
        <p>sudah punya akun? <a href="login_mahasiswa.php">login</a></p>
    </form>


</body>

</html>