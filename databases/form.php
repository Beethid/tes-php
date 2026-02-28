<?php
session_start(); // WAJIB di baris 1
include "connection.php";

// Ambil ID dari session yang sudah kita set di login.php
$user_id = $_SESSION['user_id'] ?? null;

// Cek jika user belum login, hentikan proses
if (!$user_id) {
    die("Error: Anda belum login. ID user tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    // Tips: Karena sudah login, $kelas dll sebenarnya bisa diambil dari $_SESSION juga
    $nama = $_POST['nama'] ?? $_SESSION['username']; 
    $kelas = $_POST['kelas'] ?? $_SESSION['kelas'];
    $jurusan = $_POST['jurusan'] ?? $_SESSION['jurusan'];
    $bidang = $_POST['bidang'] ?? $_SESSION['bidang'];
    $keterangan = $_POST['kehadiran'];
    $alasan = $_POST['alasan'] ?? null;

    $uploadError = "";
    $mc = null;

    // --- LOGIKA HAVERSINE (Jarak) ---
    $schoolLat = 1.0269833359610152;
    $schoolLng = 103.96261591957979;
    $userLat = isset($_POST['latitude']) && $_POST['latitude'] !== '' ? floatval($_POST['latitude']) : null;
    $userLng = isset($_POST['longitude']) && $_POST['longitude'] !== '' ? floatval($_POST['longitude']) : null;

    if ($userLat && $userLng) {
        $earthRadius = 6371000;
        $latFrom = deg2rad($schoolLat);
        $lonFrom = deg2rad($schoolLng);
        $latTo = deg2rad($userLat);
        $lonTo = deg2rad($userLng);
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $a = sin($latDelta/2) * sin($latDelta/2) +
             cos($latFrom) * cos($latTo) *
             sin($lonDelta/2) * sin($lonDelta/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $distance = $earthRadius * $c;

        if ($distance > 100 && $keterangan === "Hadir") {
            $keterangan = "Alpha";
        }
    }

    // --- VALIDASI & UPLOAD MC ---
    if($keterangan === 'Sakit' && isset($_FILES['foto'])){
        // ... (kode upload kamu sudah benar, pastikan variabel $mc terisi) ...
        $namaFile = $_FILES['foto']['name'];
        $tmpFile = $_FILES['foto']['tmp_name'];
        $mc = "mc_" . $_SESSION('username') . "_" . time() . ".jpg"; 
        move_uploaded_file($tmpFile, "uploads/" . $mc);
    }

    // --- INSERT KE DATABASE ---
    if(isset($_POST['submit'])){
        if($uploadError !== ""){
            echo "<p style='color:red;'>$uploadError</p>";
        } else {
            // Gunakan prepared statement agar lebih aman
            $sql = "INSERT INTO absensi (user_id, kelas, jurusan, bidang, keterangan, alasan, mc) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssss", $user_id, $kelas, $jurusan, $bidang, $keterangan, $alasan, $mc);
            
            if($stmt->execute()){
                echo "<p style='color:green;'>Berhasil absen!</p>";
            } else {
                echo "<p style='color:red;'>Gagal Insert: " . $conn->error . "</p>";
            }
        }
    }
}
?>