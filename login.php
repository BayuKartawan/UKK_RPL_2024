<?php

session_start();
include 'koneksi.php';

//post
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //role mahasiswa
    if ($_POST['role'] == "mahasiswa") {
        $excute = $koneksi-> query("SELECT * FROM mahasiswa where username = '$username' and password = '$password'");

        $excute = $excute->fetch_assoc();

        //permisi role mahasiswa
        if ($excute) {
            $_SESSION['id'] = $excute['nim'];
            $_SESSION['login'] = true;
            $_SESSION['role'] = "mahasiswa";
            header("location: index.php");
        } else {
            echo "<script>
            alert('Gagal login, Masukkan username dan password yang benar');
            </script>";
        }
    }
    //role prodi
    else {
        $excute = $koneksi->query("SELECT * FROM program_studi where username = '$username' and password = '$password'");

        $excute = $excute->fetch_assoc();

        //permisi role prodi
        if ($excute) {
            $_SESSION['login'] = true;
            $_SESSION['role'] = "program_studi";
            header("location: index.php");
        } else {
            echo "<script>
            alert('Gagal login, Masukkan username dan password yang benar');
            </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST" class="form">
        <h1>Halaman Masuk</h1>

        <input type="username" name="username" placeholder="Masukkan username">
        <input type="password" name="password" placeholder="Masukkan password">
        <select name="role">
            <option value="mahasiswa">Mahasiswa</option>
            <option value="program_studi">Program Studi</option>
        </select>
        <button type="submit">Masuk</button>
        <p>Belum punya akun? <a href="daftar.php">Daftar</a></p>
    </form>
</body>

</html>