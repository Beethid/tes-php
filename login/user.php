<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !=='user')  {
  header("Location: ../index.html");
  exit;
}
else {
  header("Location:  ../landing_page/absen.php");
  exit;
}
;
?>