<?php
session_start();
require_once __DIR__ . "/../../../config/database.php";

// Cek hak akses admin (sesuaikan dengan session login Anda)
$isAdmin = isset($_SESSION['username']) && $_SESSION['username'] === 'admin101';
$homeUrl = $isAdmin ? '../../admin/main.php' : '../main.php';

// Ambil data produk dari database
try {
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $products = [];
}

// Ambil session error (misal gagal hapus) lalu langsung unset agar tidak muncul terus
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$title = "Data Produk - Koperasi Sekolah";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../../styles/pages/main/products/index.css">
    <style>
        .alert-error { background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .btn-action { padding: 5px 10px; text-decoration: none; border-radius: 4px; color: #fff; font-size: 13px; display: inline-block; margin-right: 4px; }
        .btn-edit-action { background-color: #f39c12; }
        .btn-delete-action { background-color: #e74c3c; }
    </style>
</head>
<body>
    <?php require_once __DIR__ . "/../../../components/landing/main/header.php" ?>
    
    <main>
        <div class="product-subheader subheader">
            <h1>Daftar Produk Koperasi</h1>
            <a href="<?= $homeUrl; ?>">&laquo; Kembali ke Beranda</a>
        </div>

        <div class="content">
            <?php if ($isAdmin): ?>
                <div class="admin-btn-group">
                    <a href="create.php" class="btn-create">+ Tambah Produk Baru</a>
                    <a href="edit.php" class="btn-edit">Edit Produk</a>
                </div>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="<?= $isAdmin ? 9 : 8 ?>" style="text-align: center;">Belum ada data produk.</td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($products as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['product_code']); ?></td>
                            <td><?= htmlspecialchars($row['product_name']); ?></td>
                            <td><?= htmlspecialchars($row['category']); ?></td>
                            <td><?= htmlspecialchars($row['unit']); ?></td>
                            <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
                            <td><?= $row['stock']; ?></td>
                            <td><?= htmlspecialchars($row['entry_date']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="dummy">.</div>
    </main>

    <?php require_once __DIR__ . "/../../../components/landing/main/footer.php" ?>
</body>
</html>