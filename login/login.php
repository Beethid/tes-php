<?php
session_start(); 

$users = [
  "admin" => [
    "password" => "admin222",
    "role" => "admin"
  ],
  "ferdian" => [
    "password" => "orangimut123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TEKOJA 1",
    "bidang" => "Web Design"
  ],
  "ferdi" => [
    "password" => "adminbaikhati123",
    "role" => "admin"
  ],
  "abdur" => [
    "password" => "abdur123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 1",
    "bidang" => "Web Design"
  ],
  "raisyah" => [
    "password" => "raisyah123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 1",
    "bidang" => "Web Design"
  ],
  "jollyfia" => [
    "password" => "jollyfia123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 1",
    "bidang" => "Web Design"
  ],
  "adnan" => [
    "password" => "adnan123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 1",
    "bidang" => "Web Design"
  ],
  "aulia" => [
    "password" => "aulia123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 2",
    "bidang" => "Web Design"
  ],
  "cut" => [
    "password" => "cut123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "DKV 2",
    "bidang" => "Web Design"
  ],
  "dea" => [
    "password" => "dea123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 2",
    "bidang" => "Web Design"
  ],
  "ega" => [
    "password" => "ega123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "DKV 2",
    "bidang" => "Web Design"
  ],
  "ilmi" => [
    "password" => "ilmi123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "DKV 1",
    "bidang" => "Web Design"
  ],
  "jeremi" => [
    "password" => "jeremi123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 5",
    "bidang" => "Web Design"
  ],
  "ken" => [
    "password" => "ken123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "DKV 1",
    "bidang" => "Web Design"
  ],
  "maria" => [
    "password" => "maria123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 1",
    "bidang" => "Web Design"
  ],
  "nursyafika" => [
    "password" => "TKJ",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 1",
    "bidang" => "Web Design"
  ],
  "nyla" => [
    "password" => "nyla123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 2",
    "bidang" => "Web Design"
  ],
  "putri" => [
    "password" => "putri123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "DKV 2",
    "bidang" => "Web Design"
  ],
  "rasyad" => [
    "password" => "rasyad123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "DKV 2",
    "bidang" => "Web Design"
  ],
  "risha" => [
    "password" => "risha123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 2",
    "bidang" => "Web Design"
  ],
  "tsaniyah" => [
    "password" => "tsaniyah123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "TKJ 2",
    "bidang" => "Web Design"
  ],
  "yadah" => [
    "password" => "yadah123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "DKV 2",
    "bidang" => "Web Design"
  ],
  "malika" => [
    "password" => "malika123",
    "role" => "user",
    "kelas" => "X",
    "jurusan" => "DKV 2",
    "bidang" => "Web Design"
  ],

];

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($users[$username]) && $users[$username]['password'] === $password) {
  $_SESSION['user'] = $username;
  $_SESSION['role'] = $users[$username]['role'];
  $_SESSION['kelas'] = $users[$username]['kelas'];
  $_SESSION['jurusan'] = $users[$username]['jurusan'];
  $_SESSION['bidang'] = $users[$username]['bidang'];

  if ($_SESSION['role'] === "admin") {
    header("Location: ../landing_page/admin_page.php");
  } else {
    header("Location: ../landing_page/absen.php");
  }
  exit;

} else {
  header("Location: ../index.html?error=1");
  exit;
}
?>