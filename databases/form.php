<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $bidang = $_POST['bidang'];
    $keterangan = $_POST['kehadiran'];
    $alasan = $_POST['alasan'] ?? null;

    $uploadError = "";
    $mc = null;

    // Koordinat sekolah
$schoolLat = 1.0269833359610152;
$schoolLng = 103.96261591957979;

// Ambil koordinat user
$userLat = isset($_POST['latitude']) && $_POST['latitude'] !== '' 
    ? floatval($_POST['latitude']) 
    : null;

$userLng = isset($_POST['longitude']) && $_POST['longitude'] !== '' 
    ? floatval($_POST['longitude']) 
    : null;
// Radius bumi (meter)
$earthRadius = 6371000;

// Konversi ke radian
$latFrom = deg2rad($schoolLat);
$lonFrom = deg2rad($schoolLng);
$latTo = deg2rad($userLat);
$lonTo = deg2rad($userLng);

$latDelta = $latTo - $latFrom;
$lonDelta = $lonTo - $lonFrom;

// Rumus Haversine
$a = sin($latDelta/2) * sin($latDelta/2) +
     cos($latFrom) * cos($latTo) *
     sin($lonDelta/2) * sin($lonDelta/2);

$c = 2 * atan2(sqrt($a), sqrt(1-$a));

$distance = $earthRadius * $c; // hasil dalam meter

// Kalau lebih dari 100 meter → Alpha
if ($distance > 100 && $keterangan === "Hadir") {
    $keterangan = "Alpha";
}

    // Validasi file MC jika sakit
    if($keterangan === 'Sakit' && isset($_FILES['foto'])){
        $namaFile = $_FILES['foto']['name'];
        $tmpFile = $_FILES['foto']['tmp_name'];
        $fileType = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png'];   // Hanya JPG

        // Cek ekstensi
        if(!in_array($fileType, $allowedTypes)){
            $uploadError = "Upload gagal: Hanya file JPG yang diperbolehkan.";
        } else {
            // Cek MIME type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $tmpFile);
            finfo_close($finfo);
            if($mime !== 'image/jpeg'){
                $uploadError = "Upload gagal: File bukan gambar JPG yang valid.";
            }
        }

        // Upload file jika valid
        if($uploadError === ""){
            $folders = "uploads/";
            if(!is_dir($folders)){
                mkdir($folders, 0777, true);
            } 

            $mc = "mc_" . preg_replace("/[^a-zA-Z0-9]/", "_", $nama) . '.jpg';
            if(!move_uploaded_file($tmpFile, $folders . $mc)){
                $uploadError = "Upload gagal: Terjadi kesalahan saat memindahkan file.";
            }
        }
    }

    // Hanya insert ke database jika tidak ada error
    if(isset($_POST['submit'])){
        if($uploadError !== ""){
            echo "<p style='color:red;'>$uploadError</p>";
        } else {
            $sql = "INSERT INTO users (nama, kelas, jurusan, bidang, keterangan, alasan, mc) 
                    VALUES ('$nama', '$kelas', '$jurusan', '$bidang','$keterangan','$alasan', '$mc')";
            $query = mysqli_query($conn, $sql);
            if($query){
                echo "<p style='color:green;'>Berhasil memasukkan ke database</p>";
            } else {
                echo "<p style='color:red;'>Gagal Insert: " . mysqli_error($conn) . "</p>";
            }
        }
    }
}
?>
