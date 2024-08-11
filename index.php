<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

if (isset($_POST['topik_skripsi'])) {
    $topik = $_POST['topik_skripsi'];
    $id_mahasiswa = $_SESSION['id'];
    $excute = $koneksi->query("INSERT INTO skripsi (topik_skripsi, id_mahasiswa) VALUES ('$topik', $id_mahasiswa)");
    if ($excute) {
        echo "<script>
            alert('Skripsi berhasil di ajukan');
        </script>";
    }
}

if ($_SESSION['role'] == "prodi") {
    $excute = $koneksi->query("SELECT * FROM skripsi");
    $rows = [];
    while ($row = $excute->fetch_assoc()) {
        $rows[] = $row;
    }
    $data = $rows;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>Document</title>
</head>

<body>
    <a href="logout.php">logout</a>

    <!-- mahasiswa -->
    <?php if ($_SESSION['role'] == "mahasiswa"): ?>
        <form action="" method="post">
            <h1>Ajukan skripsi</h1>
            <textarea name="topik_skripsi" id="" row="5">Masukan judul</textarea>
            <button type="submit">submit</button>
        </form>

    <!-- prodi  -->
    <?php else: ?>
        <h1>Daftar skrispi</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Topik Skrispsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $d): ?>
                    <tr>
                        <td><?= ++$key; ?></td>
                        <td><?= $d['topik_skripsi']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>

</html>