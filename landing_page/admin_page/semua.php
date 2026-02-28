<?php
include "../databases/connection.php";
$filter = $_GET['filter'] ?? 'all';

// Gunakan INNER JOIN untuk mengambil kolom 'username' dari tabel 'users'
$base_sql = "SELECT absensi.*, users.username 
             FROM absensi 
             INNER JOIN users ON absensi.user_id = users.id";

if($filter == 'hadir'){
    $sql = "$base_sql WHERE absensi.keterangan='Hadir' ORDER BY absensi.id DESC";
} elseif($filter == 'sakit'){
    $sql = "$base_sql WHERE absensi.keterangan='Sakit' ORDER BY absensi.id DESC";
} elseif($filter == 'alpha'){
    $sql = "$base_sql WHERE absensi.keterangan='Alpha' ORDER BY absensi.id DESC";
} else {
    $sql = "$base_sql ORDER BY absensi.id DESC";
}

$query = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
  <h2>Absensi Siswa</h2>
  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Bidang</th>
        <th>Keterangan</th>
        <th>Alasan</th>
        <th>MC</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($query)) : ?>
        <tr>
          <td><?= $row['username']; ?></td> 
          <td><?= $row['kelas']; ?></td>
          <td><?= $row['jurusan']; ?></td>
          <td><?= $row['bidang']; ?></td>
          <td><?= $row['keterangan']; ?></td>
          <td><?= $row['alasan']; ?></td>
          <td>
            <?php if(!empty($row['mc'])) : ?>
              <a href="../databases/uploads/<?= $row['mc']; ?>" target="_blank">Lihat</a>
            <?php else: ?>
              -
            <?php endif; ?>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>