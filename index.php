<?php
$title = "Beranda - Koperasi Sekolah";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <?php require_once __DIR__ . "/components/landing/index/header.php" ?>

    <section class="hero">
        <div class="upper">
            <h1>Sistem Koperasi Sekolah</h1>
            <p>Menyimpan data seperti produk, supplier dan karyawan koperasi sekolah</p>
        </div>

        <div class="hero-cta">
            <p>Yang dapat anda lakukan sekarang:</p>
            <div class="hero-cta-button">
                <a href="./pages/login/login.php">Login</a>
            </div>
        </div>
    </section>

  <?php require_once __DIR__ . "/components/landing/index/footer.php" ?>
</body>

</html>
