<?php
$title = "Register - Koperasi Sekolah";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <link rel="stylesheet" href="./../../styles/pages/login/register.css">
</head>
<body>
    <div class="form">
        <form action="../../actions/auth/login.php" method="post">
            <h1>Register</h1>
            <div class="input-form">
                <div class="input username">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                </div>
                
                <div class="input password">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="input email">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="input address">
                    <label for="address">Address</label>
                    <input type="address" id="address" name="address">
                </div>

                <div class="input gender">
                    <p>Gender</p>
                    <div class="choice">
                        <div class="choice-item">
                            <input type="radio" id="male" name="gender" value="M">
                            <label for="male">Laki-laki</label>
                        </div>
                        <div class="choice-item">
                            <input type="radio" id="female" name="gender" value="F">
                            <label for="female">Perempuan</label>
                        </div>
                    </div>
                </div>
                
                <div class="input birthdate">
                    <label for="birthdate">Tanggal lahir</label>
                    <input type="date" id="birthdate" name="birthdate">
                </div>

                <div class="submit-btn">
                    <button type="submit" name="register">Daftar</button>
                </div>
                <p class="login">Balik ke <a href="login.php">login</a>!</p>
            </div>
        </form>
    </div>
</body>
</html>