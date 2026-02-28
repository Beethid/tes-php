<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
  header("Location: ../index.html");
  exit;
}
else {
  header("Location:  ../landing_page/admin_page.php");
}
?>