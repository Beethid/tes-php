<?php
include "../databases/connection.php"; // pastikan path bener

// Ambil data siswa yang sakit
$sql = "SELECT * FROM users WHERE keterangan='Alpha' ORDER BY id DESC";
$query = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
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
          <td><?= $row['nama']; ?></td>
          <td><?= $row['kelas']; ?></td>
          <td><?= $row['jurusan']; ?></td>
          <td><?= $row['bidang']; ?></td>
          <td><?= $row['keterangan']; ?></td>
          <td><?= $row['alasan']; ?></td>
          <td>
            <?php if($row['mc']) : ?>
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