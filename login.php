<?php

session_start();
include 'koneksi.php';
// ini untuk method POST
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($_POST['role'] == "mahasiswa") {
        $excute = $koneksi->query("SELECT * FROM mahasiswa where username='$username' and password='$password'");

        $excute = $excute->fetch_assoc();

        if ($excute) {
            $_SESSION['id'] = $excute['id_mahasiswa'];
            $_SESSION['login'] = true;
            $_SESSION['role'] = "mahasiswa";
            header("Location: index.php");
        } else {
            echo "login gagal";
        }
    } else {
        $excute = $koneksi->query("SELECT * FROM prodi where username='$username' and password='$password'");

        $excute = $excute->fetch_assoc();

        if ($excute) {

            $_SESSION['login'] = true;
            $_SESSION['role'] = "prodi";
            header("Location: index.php");
        } else {
            echo "login gagal";
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <title>Halaman Login</title>
</head>

<body>

    <form action="" method="POST">
        <h1 class="title">Halaman login</h1>

        <input type="text" name="username" placeholder="masukkan username">
        <input type="password" name="password" placeholder="masukkan password">
        <select name="role">
            <option value="prodi">prodi</option>
            <option value="mahasiswa">mahasiswa</option>
        </select>

        <button type="submit">Submit</button>
        <p>Belum punya akun? <a href="register.php">register</a></p>
    </form>

</body>

</html>