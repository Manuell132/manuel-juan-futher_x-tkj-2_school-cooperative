<?php
session_start();
require_once __DIR__ . '/../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $category     = $_POST['category'];
    $unit         = $_POST['unit'];
    $price        = $_POST['price'];
    $stock        = $_POST['stock'];
    $entry_date   = $_POST['entry_date'];
    $description  = $_POST['description'];

    try {
        $stmt = $pdo->prepare("INSERT INTO products (product_code, product_name, category, unit, price, stock, entry_date, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$product_code, $product_name, $category, $unit, $price, $stock, $entry_date, $description]);
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        $error = "Gagal menyimpan data: " . $e->getMessage();
    }
}

$title = "Tambah Produk - Koperasi Sekolah";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../../styles/pages/main/products/create.css">
</head>
<body>
    <?php require_once __DIR__ . "/../../../components/landing/main/header.php" ?>
    
    <main>
        <div class="product-subheader subheader">
            <h1>Tambah Produk Baru</h1>
            <a href="index.php">&laquo; Kembali ke Daftar Produk</a>
        </div>

        <div class="content">
            <?php if (isset($error)): ?>
                <p style="color: red; margin-bottom: 15px;"><?= $error; ?></p>
            <?php endif; ?>

            <form action="" method="POST">
                <div>
                    <label>Kode Produk:</label><br>
                    <input type="text" name="product_code" required>
                </div>
                <div>
                    <label>Nama Produk:</label><br>
                    <input type="text" name="product_name" required>
                </div>
                <div>
                    <label>Kategori:</label><br>
                    <select name="category">
                        <option value="Food">Food</option>
                        <option value="Drink">Drink</option>
                        <option value="Stationery">Stationery</option>
                        <option value="Uniform">Uniform</option>
                    </select>
                </div>
                <div>
                    <label>Satuan (Unit):</label><br>
                    <select name="unit">
                        <option value="Pcs">Pcs</option>
                        <option value="Pack">Pack</option>
                        <option value="Bottle">Bottle</option>
                    </select>
                </div>
                <div>
                    <label>Harga (Rp):</label><br>
                    <input type="number" step="0.01" name="price" required>
                </div>
                <div>
                    <label>Stok:</label><br>
                    <input type="number" name="stock" required>
                </div>
                <div>
                    <label>Tanggal Masuk:</label><br>
                    <input type="date" name="entry_date" required>
                </div>
                <div>
                    <label>Deskripsi:</label><br>
                    <textarea name="description" rows="4"></textarea>
                </div>
                <div>
                    <button type="submit">Simpan Produk</button>
                </div>
            </form>
        </div>
        <div class="dummy">.</div>
    </main>

    <?php require_once __DIR__ . "/../../../components/landing/main/footer.php" ?>
</body>
</html>