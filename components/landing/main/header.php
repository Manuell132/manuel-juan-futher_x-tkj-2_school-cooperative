<header class="main-header">
    <p class="main-header-title">Koperasi Sekolah</a>
    <div class="main-header-right">
        <p class="user"><?= htmlspecialchars($_SESSION['username']); ?></p>
        <a href="../../../pages/login/login.php" class="btn-logout" onclick="return confirm('Yakin ingin keluar akun?')">Log Out</a>
    </div>
</header>