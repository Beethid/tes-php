<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: ../index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body class="d-flex align-items-center justify-content-center">
    <form action="../databases/form.php" method="POST" class="form" enctype="multipart/form-data">
      

      <h2 class="text-center" id="judul">Absensi Eksul Coding</h2>

      <div class="mb-3 d-flex flex-column">
        <label for="nama" class="form-label">Nama</label>
        <input
          type="text"
          id="nama"
          name="nama"
          class="form-control"
          required
          value="<?php echo $_SESSION['user']; ?>"
          readonly
        />
        
      </div>

      <div class="mb-3 d-flex flex-column">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" name="kelas" class="form-control" value="<?php echo $_SESSION['kelas']; ?>" readonly
/>
      </div>

      <div class="mb-3 d-flex flex-column">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input name="jurusan" class="form-control" type="text" value="<?php echo $_SESSION['jurusan'];?>" readonly> 
        </input>
      </div>

      <div class="mb-3 d-flex flex-column">
        <label for="bidang" class="form-label">Bidang</label>
        <input name="bidang" id="bidang" class="form-control" type="text" value="<?php echo $_SESSION['bidang']?>" </input>
      </div>

      <div class="mb-3 d-flex flex-column">
        <label for="kehadiran" class="form-label">Keterangan</label>
        <select name="kehadiran" id="kehadiran" class="form-select" required>
          <option value="" selected disabled>-- Keterangan --</option>
          <option value="Hadir">Hadir</option>
          <option value="Sakit">Sakit</option>
          <option value="Izin">Izin</option>
          <option value="Alpha">Alpha</option>
        </select>
      </div>

      <div class="mb-3 d-none" id="mc">
        <label for="foto" class="form-label">Surat Keterangan Sakit</label>
        <input
          class="form-control"
          type="file"
          id="foto"
          name="foto"
          accept="image/*"
          required
        />
      </div>

      <div class="mb-3 d-flex flex-column d-none" id="Alasan">
        <label for="alasan" class="form-label">Alasan</label>
        <input
          type="text"
          id="alasan"
          name="alasan"
          class="form-control"
          required
        />
      </div>
      <div class="tampung d-flex">
        <button class="m-2 btn btn-danger w-50" type="reset">Reset</button>
        <button class="m-2 btn btn-primary w-50" type="submit" name="submit">Send</button>
      </div>
      <input type="hidden" name="latitude" id="latitude">
<input type="hidden" name="longitude" id="longitude">
    </form>
    <script src="../js/script.js"></script>
  </body>
</html>
