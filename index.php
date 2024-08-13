<?php

session_start();
include 'koneksi.php';

//permisi
if (!isset($_SESSION['login'])) {
    header("location: login.php");
}

//post pengajuan

if (isset($_POST['topik_1'])) {
    $dospem = $_POST['dospem'];
    $topik_1 = $_POST['topik_1'];
    $topik_2 = $_POST['topik_2'];
    $topik_3 = $_POST['topik_3'];
    $nim = $_SESSION['id'];

    $excute = $koneksi->query("INSERT INTO pengajuan_topik (dosen_pembimbing_utama, topik_1,topik_2,topik_3,nim) VALUES ('$dospem','$topik_1','$topik_2','$topik_3','$nim')");

    if ($excute) {
        echo "<script>
        alert('Berhasil mengajukan');
        </script>";
    }
}

//role prodi

if ($_SESSION['role'] == "program_studi") {
    $excute = $koneksi->query("SELECT * FROM pengajuan_topik ");
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
    <title>Dashbord</title>
    <link rel="stylesheet" href="styleindex.css">
</head>

<body>

    <a href="logout.php">Keluar</a>
    <!-- role mahasiswa -->
    <?php if($_SESSION['role'] == "mahasiswa") : ?>
    <form action="" method="post">
        <h1>Form Ajuan</h1>
        <textarea name="dospem" id="" rows="2">Masukkan dosen pembimbing utama</textarea>
        <textarea name="topik_1" id="" rows="5">Masukkan Topik 1</textarea>
        <textarea name="topik_2" id=""rows="5">Masukkan Topik 2</textarea>
        <textarea name="topik_3" id=""rows="5">Masukkan Topik 3</textarea>
        <button type="submit">Ajukan</button>
    </form>

    <!-- role prodi -->
    <?php else : ?>
        <h1>Daftar Ajuan Mahasiswa</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Dosem Pembimbing Utama</th>
                <th>Topik 1</th>
                <th>Topik 2</th>
                <th>Topik 3</th>
            </tr>
        </thead>
    <tbody>
        <?php foreach($data as $key => $d ) : ?>
        <tr>
            <td><?= ++$key ;?></td>
            <td><?= $d['nim']; ?></td>
            <td><?= $d['dosen_pembimbing_utama']; ?></td>
            <td><?= $d['topik_1']; ?></td>
            <td><?= $d['topik_2']; ?></td>
            <td><?= $d['topik_3']; ?></td>
        </tr>
        <?php endforeach ; ?>
    </tbody>
    </table>
    <?php endif ; ?>
</body>

</html>