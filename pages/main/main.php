<?php
session_start();
$title = "Beranda - Koperasi Sekolah";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./../../styles/pages/main/main.css">
</head>
<body>
    <?php require_once __DIR__ . "/../../components/landing/main/header.php" ?>
    <main>
        <div class="welcome">
            <h2>Selamat Datang di Sistem Koperasi Sekolah, <?= htmlspecialchars($_SESSION['username']); ?></h2>
            <p>Senang bisa melihat kamu kembali!</p>
        </div>
        
        <div class="cta">
            <p>Lihat tabel:</p>
            <div class="cta-btn-group">
                <a href="./products/index.php">Tabel Produk</a>
                <a href="./suppliers/index.php">Tabel Supplier</a>
                <a href="./employees/index.php">Tabel Karyawan</a>
            </div>
        </div>
    </main>
    <?php require_once __DIR__ . "/../../components/landing/main/footer.php" ?>
</body>
</html>