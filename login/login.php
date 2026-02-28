<?php
session_start();
include "../databases/connection.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if($user = $result->fetch_assoc()) {
    if(password_verify($password, $user['password_hash'])) {
        // SET SESSION UTAMA (Berlaku buat Admin & User)
        $_SESSION['user_id']  = $user['id']; // Ini yang bener, pakai $user
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = $user['role'];

        // Jika dia User biasa, simpan data tambahannya
        if($user['role'] === 'user') {
            $_SESSION['kelas']   = $user['kelas'];
            $_SESSION['jurusan'] = $user['jurusan'];
            $_SESSION['bidang']  = $user['bidang'];
            
            header("Location: ../landing_page/absen.php");
        } else {
            // Jika dia Admin
            header("Location: ../landing_page/admin_page.php");
        }
        exit;
    }
}

// Jika gagal
header("Location: ../index.html?error=1");
exit;
?>