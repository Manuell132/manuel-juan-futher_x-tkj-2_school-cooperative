<?php
require_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username  = trim($_POST['username']);
    $password  = $_POST['password'];
    $email     = trim($_POST['email']);
    $address   = trim($_POST['address']);
    $gender    = isset($_POST['gender']) ? $_POST['gender'] : '';
    $birth_date = $_POST['birthdate'];

    if (empty($username) || empty($password) || empty($address) || empty($gender) || empty($birth_date)) {
        echo "<script>alert('Harap isi semua kolom input'); window.history.back();</script>";
        exit;
    }

    try {
        $sql = "INSERT INTO users (username, password, email, address, gender, birth_date) 
                VALUES (:username, :password, :email, :address, :gender, :birth_date)";
        
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':username'  => $username,
            ':password'  => $password,
            ':email'     => $email,
            ':address'   => $address,
            ':gender'    => $gender,
            ':birth_date' => $birth_date
        ]);

        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='../../pages/login/login.php';</script>";

    } catch (PDOException $e) {
        echo "<script>alert('Registrasi gagal: " . $e->getMessage() . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../../index.php");
    exit;
}
?>