<?php
session_start();
include "../databases/connection.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.html");
    exit;
}

$allowedFilter = ['semua','hadir','sakit','alpha','izin'];
$filter = $_GET['filter'] ?? 'semua'; 

if (!in_array($filter, $allowedFilter)) {
    $filter = 'semua';
}



if(isset($_GET['export']) && $_GET['export'] == 'excel'){

    if($filter == 'hadir'){
        $sql = "SELECT * FROM absensi WHERE keterangan='Hadir' ORDER BY id DESC";
    } elseif($filter == 'sakit'){
        $sql = "SELECT * FROM absensi WHERE keterangan='Sakit' ORDER BY id DESC";
    } elseif($filter == 'alpha'){
        $sql = "SELECT * FROM absensi WHERE keterangan='Alpha' ORDER BY id DESC";
    } elseif($filter == 'izin'){
        $sql = "SELECT * FROM absensi WHERE keterangan='Izin' ORDER BY id DESC";
    } else {
        $sql = "SELECT * FROM absensi ORDER BY id DESC";
    }

    $query = mysqli_query($conn, $sql);

    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=data_absensi.csv");

    $output = fopen("php://output", "w");

    fputcsv($output, ['Nama','Kelas','Jurusan','Bidang','Keterangan','Alasan']);

    while($row = mysqli_fetch_assoc($query)){
        fputcsv($output, [
            $row['nama'],
            $row['kelas'],
            $row['jurusan'],
            $row['bidang'],
            $row['keterangan'],
            $row['alasan']
        ]);
    }

    fclose($output);
    exit();
}

if(isset($_POST['submit_user'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $bidang = mysqli_real_escape_string($conn, $_POST['bidang']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, kelas, jurusan, bidang, role, password_hash)
            VALUES ('$nama','$kelas','$jurusan','$bidang','$role','$password')";
    $query = mysqli_query($conn, $sql);

    if($query){
        echo "<script>alert('User berhasil ditambahkan'); window.location='admin_page.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav style="position:fixed; left:0;right:0;top:0;" class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="?filter=semua">Semua</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?filter=hadir">Hadir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?filter=sakit">Sakit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?filter=izin">Izin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?filter=alpha">Alpha</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div style="margin-top:80px">
<?php
if ($filter == 'hadir') {
    include "admin_page/hadir.php";
} elseif ($filter == 'sakit') {
    include "admin_page/sakit.php";
} elseif ($filter == 'alpha') {
    include "admin_page/alpha.php";
} elseif ($filter == 'izin') {
    include "admin_page/izin.php";
} else {
    include "admin_page/semua.php";
}
?>
</div>

<div class="container mt-3">
    <a href="?filter=<?= $filter ?>&export=excel" 
       class="btn btn-success">
       Download Excel
    </a>
</div>
  <div class="container mt-4">
    <h3>Tambah User Baru</h3>
<form action="" method="post">
    <div class="mb-3">
        <label class="form-label">Nama:</label>
        <input class="form-control" type="text" name="nama" required>
    </div>
    <div class="mb-3" >
        <label class="form-label">Kelas:</label>
        <select class="form-control" type="text" name="kelas" required>
          <option value="X">X</option>
          <option value="XI">XI</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Jurusan:</label>
        <input class="form-control" type="text" name="jurusan" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Bidang:</label>
        <input class="form-control" type="text" name="bidang" value="Web Design" readonly required>
    </div>
    <div class="mb-3">
        <label class="form-label" >Role:</label>
        <select class="form-control" name="role" class="form-control" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Password:</label>
        <input class="form-control" type="password" name="password" required>
    </div>
    <button class="btn btn-primary" type="submit" name="submit_user">Tambah User</button>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>