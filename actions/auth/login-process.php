<?php
session_start();
require_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password ga boleh kosong!'); window.history.back();</script>";
        exit;
    }

    try {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':username' => $username]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['password']) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];

            if ($user['username'] === 'admin101') {
                $_SESSION['role'] = 'admin'; // Tandai sebagai admin
                echo "<script>alert('Login berhasil! Selamat datang Admin.'); window.location.href='../../pages/admin/main.php';</script>";
            } else {
                $_SESSION['role'] = 'user'; // Tandai sebagai user biasa
                echo "<script>alert('Login berhasil! Selamat datang di sistem koperasi sekolah, " . $user['username'] . "'); window.location.href='../../pages/main/main.php';</script>";
            }

        } else {
            echo "<script>alert('Username atau password salah!'); window.history.back();</script>";
            exit;
        }

    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../../pages/main/main.php");
    exit;
}
?>