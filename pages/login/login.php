<?php
$title = "Login - Koperasi Sekolah";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <link rel="stylesheet" href="../../styles/pages/login/login.css">
</head>
<body>
    <div class="form">
        <form action="../../actions/auth/login-process.php" method="post">
            <h1>Login</h1>
            <div class="input-form">
                <div class="input username">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input password">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="submit-btn">
                    <button type="submit" name="login">Login</button>
                </div>
                <p class="register">Belum punya akun? Buat yang <a href="register.php">baru</a>!</p>
            </div>
        </form>
    </div>
</body>
</html>