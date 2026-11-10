<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin101') {
    echo "<script>alert('Akses ditolak! Halaman ini khusus admin :)'); window.location.href='../main/main.php';</script>";
    exit;
}

$title = "Admin - Koperasi Sekolah";
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
            <h2>Panel Kontrol <?= htmlspecialchars($_SESSION['username']); ?></h2>
            <p>Kelola data koperasi sekolah lewat tombol-tombol ini!</p>
        </div>
        
        <div class="cta">
            <p>Tabel yang dapat dikelola:</p>
            <div class="cta-btn-group">
                <a href="./../main/account-list.php">Tabel Akun User</a>
                <a href="./../main/products/index.php">Tabel Produk</a>
                <a href="./../main/suppliers/index.php">Tabel Supplier</a>
                <a href="./../main/employees/index.php">Tabel Karyawan</a>
            </div>
        </div>
    </main>
    <?php require_once __DIR__ . "/../../components/landing/main/footer.php" ?>
</body>
</html>