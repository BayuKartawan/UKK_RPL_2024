<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['login'])) {
    header("Location: auth/login_mahasiswa.php");
}

if (isset($_POST['topik_skripsi'])) {
    $topik = $_POST['topik_skripsi'];
    $desk = $_POST['deskripsi'];
    $id_mahasiswa = $_SESSION['id'];
    $excute = $koneksi->query("INSERT INTO skripsi (topik_skripsi, deskripsi, id_mahasiswa) VALUES ('$topik', '$desk', $id_mahasiswa)");
    if ($excute) {
        echo "<script>
            alert('Skripsi berhasil di ajukan');
        </script>";
    }
}

// if ($_SESSION['role'] == "prodi") {
//     $excute = $koneksi->query("SELECT * FROM skripsi");
//     $rows = [];
//     while ($row = $excute->fetch_assoc()) {
//         $rows[] = $row;
//     }
//     $data = $rows;
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            /* Sesuaikan dengan warna latar belakang yang diinginkan */
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center items horizontally */
            gap: 20px;
            /* Space between elements */
            padding: 20px;
        }

        .container a {
            padding: 10px;
            border: 1px #f0f0f0;
            background-color: red;
            border-radius: 20px;
            color: white;
        }

        /* Style untuk form ajuan */
        .form-ajuan {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
            /* Agar form berada di tengah layar */
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .form-ajuan h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-ajuan textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            /* Agar padding tidak mempengaruhi width */
        }

        .form-ajuan button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-ajuan button:hover {
            background-color: #45a049;
        }

        .form-ajuan textarea::placeholder {
            color: #999;
            font-style: italic;
        }

        /* prodi */
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <a href="auth/logout.php">logout</a>

        <!-- mahasiswa -->
        <!-- <?php if ($_SESSION['role'] == "mahasiswa"): ?> -->
            <form action="" method="post" class="form-ajuan">
                <h1>Ajukan skripsi</h1>
                <textarea name="topik_skripsi" id="" row="5">Masukan judul</textarea>
                <textarea name="deskripsi" id="" row="5">Masukan deskripsi</textarea>
                <button type="submit">submit</button>
            </form>

            <!-- prodi  -->
        <!-- <?php else: ?>
            <h1>Daftar skrispi</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Topik Skrispsi</th>
                        <th>deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $d): ?>
                        <tr>
                            <td><?= ++$key; ?></td>
                            <td><?= $d['topik_skripsi']; ?></td>
                            <td><?= $d['deskripsi']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?> -->
    </div>
</body>

</html>