<?php
session_start(); 

$users = [
  'admin' => [
    'password' => '$2y$10$nJFKTFh9N6g7sdwms/TFRO2C66.VA57QPkvPl/9rYxNEQme6JuYaG',
    'role' => 'admin'
  ],
  'ferdian' => [
    'password' => '$2y$10$mM884mwBAI.4049TBiPGwu7jMIFUau.kUwZhm9UGJR1usmH/A0qTG',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TEKOJA 1',
    'bidang' => 'Web Design'
  ],
  'ferdi' => [
    'password' => '$2y$10$cycSgbVf4KC1NdrpggmrjeQahruKkRurCHw3lEIESfti7BCbM1w/.',
    'role' => 'admin'
  ],
  'abdur' => [
    'password' => '$2y$10$IJ4khWgu1ZAw7KuuAvCnJOkjHM6cQX0qt1jCF922FTVHDaE9W8xXW',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 1',
    'bidang' => 'Web Design'
  ],
  'raisyah' => [
    'password' => '$2y$10$XcT8C49DR0dMULJuzfEWCOF51DWX7K7D4soh.VE46fyt5959iNzp.',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 1',
    'bidang' => 'Web Design'
  ],
  'jollyfia' => [
    'password' => '$2y$10$qEd.WvqD114aSORQogZzB.Ig0uwOvFE6bO9yxhOKKhQayEGzYS3VC',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 1',
    'bidang' => 'Web Design'
  ],
  'adnan' => [
    'password' => '$2y$10$wmKlZVwem8Gi7QPuhkKcsOvPQz5fOymO02FdanAPssGi1NWsC4Rta',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 1',
    'bidang' => 'Web Design'
  ],
  'aulia' => [
    'password' => '$2y$10$aQj7Enmdek7hi.KbB86GdOuL0HYym8C2JaB7q9Lrn4jqx4.BDAMNO',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 2',
    'bidang' => 'Web Design'
  ],
  'cut' => [
    'password' => '$2y$10$KjEWC.kG0iKwLLxLVYqBQuudBZ9ofh68np.CcLZr9IUEplcOl.1fW',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'DKV 2',
    'bidang' => 'Web Design'
  ],
  'dea' => [
    'password' => '$2y$10$PjJYesfSKN3kqntvhxpmcu3B04ipzhSVJ929Tj5ObxiOSljAYvEhG',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 2',
    'bidang' => 'Web Design'
  ],
  'ega' => [
    'password' => '$2y$10$mD6gIeDBiBPwF49jyH0.kuBt8M56tZxsWjGCsTEk2q90EX4KsvmDO',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'DKV 2',
    'bidang' => 'Web Design'
  ],
  'ilmi' => [
    'password' => '$2y$10$7gb8oyYcbbetlEqOqE0uKuqZD9oEavGTcCCGIjGy57FJA40LyAlhe',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'DKV 1',
    'bidang' => 'Web Design'
  ],
  'jeremi' => [
    'password' => '$2y$10$FzYY5h9NDnFuK6rJwB3jH.KpqQMpcZeSUf.lYqjPrvgGSBky74Gge',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 5',
    'bidang' => 'Web Design'
  ],
  'ken' => [
    'password' => '$2y$10$QVzkWzQtZC9oTKMcXeBMGOFK7tI5um.8dnD/RAMjMJaWnRLASExym',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'DKV 1',
    'bidang' => 'Web Design'
  ],
  'maria' => [
    'password' => '$2y$10$BpdnmAPRC6Q1QFd57CtKj.KdWhSY52OFYYPUP1ZCfQndYNZi4wMBa',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 1',
    'bidang' => 'Web Design'
  ],
  'nursyafika' => [
    'password' => '$2y$10$0GsDvqJFT/X9OQLzECmH3.jON.wUqcro.HQoGcHwBSl5YVkB8Re0C',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 1',
    'bidang' => 'Web Design'
  ],
  'nyla' => [
    'password' => '$2y$10$1U23BUcxuOUeUxlJJzpKBe18VGYqfZ2ipougq856H7J8Ey3cTBBj.',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 2',
    'bidang' => 'Web Design'
  ],
  'putri' => [
    'password' => '$2y$10$MEtwIOkLXHukTGbxdnNup.h9i.98Jv7WOF1fOsRRkncfPALIv3YpK',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'DKV 2',
    'bidang' => 'Web Design'
  ],
  'rasyad' => [
    'password' => '$2y$10$2B3BESx8f7oFx0ndHJDXd.UdiO.CgAq2gxK6Hji/a0aW0e8nY29q.',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'DKV 2',
    'bidang' => 'Web Design'
  ],
  'risha' => [
    'password' => '$2y$10$pJbn5CnyMxtEu6C.0iW6NurlFWPSb5CWV33n2Hj04FERzq4u9GR7q',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 2',
    'bidang' => 'Web Design'
  ],
  'tsaniyah' => [
    'password' => '$2y$10$XAwhj7fHuJLSDW7mYbdhhuoiPytWAWaK9Oy66uv/1SsdV2ciD3PrG',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'TKJ 2',
    'bidang' => 'Web Design'
  ],
  'yadah' => [
    'password' => '$2y$10$.qYHqZpbL84R5aetST10hOIRCYeRbOpUFrLITKg1owJ3HOduZQzfC',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'DKV 2',
    'bidang' => 'Web Design'
  ],
  'malika' => [
    'password' => '$2y$10$SStN7xG37fIRuseIFYlZ0Oy5sFmfHzKccxVkX5GSsVhVJWt1wqw.u',
    'role' => 'user',
    'kelas' => 'X',
    'jurusan' => 'DKV 2',
    'bidang' => 'Web Design'
  ],

];

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) { 
  $_SESSION['username'] = $username;
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