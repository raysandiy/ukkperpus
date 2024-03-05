<?php
$conn = mysqli_connect("localhost", "root", "", "eperpus");
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../../login.php");
    exit;
}

$query = "SELECT buku.*, kategoribuku.nama_kategori FROM buku
            JOIN kategoribuku_relasi ON buku.id = kategoribuku_relasi.buku_id
            JOIN kategoribuku ON kategoribuku_relasi.kategori_id = kategoribuku.id
            INNER JOIN koleksi ON buku.id = koleksi.bukuid
            WHERE koleksi.userid = {$_SESSION['user_id']}";

$result = mysqli_query($conn, $query);
$buku = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Koleksi Buku</title>
    <style>
        body {
            background-image: url("../../assets/background.png");
    background-size: cover;
    background-repeat: no-repeat;
    height: 100vh; /* Set the height to 100% of the viewport height */
    margin: 0; /* Remove default margin */
}

        .navbar-brand {
            position: absolute;
            top: 0;
            left: 0;
            margin: 10px;
        }

        .title {
            text-align: center;
            color: #fff;
            margin-bottom: 2rem;
            text-shadow: 0 0 3px black;
        }

        .layout-card-custom {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
        }

        .card {
            border: 2px solid #000;
        }

        .btn-detail {
            background-color: #3c4a6b;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-right: 5px;
        }

        .btn-detail:hover {
            background-color: #2c3756;
        }

        .btn-kembali {
            background-color: #FFC0CB;
            border: none;
            color: #black;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-top:50px;
        }

        .btn-kembali:hover {
            background-color: #2c3756;
        }
    </style>
</head>
<body>
    <h2 class="title">Koleksi Buku</h2>
    <a href="../dashboardmember.php" class="btn btn-kembali"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
    <a class="navbar-brand" href="../dashboardmember.php">
        <img src="../../assets/logoo.png" alt="logo" width="100px">
    </a>

    <div class="p-4 mt-5">
        <div class="layout-card-custom">
            <?php foreach ($buku as $item) : ?>
                <div class="card" style="width: 15rem;">
                    <img src="../../imgDB/<?= $item["cover"]; ?>" class="card-img-top" alt="coverBuku" height="250px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item["judul"]; ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori : <?= $item["nama_kategori"]; ?></li>
                    </ul>
                    <div class="card-body">
                        <a class="btn btn-detail" href="detailBuku.php?id=<?= $item["id"]; ?>">Detail</a>
                    </div>
                </div>
            <?php endforeach; ?>
</body>
</html>
