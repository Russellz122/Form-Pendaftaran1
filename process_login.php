<?php
require 'db.php';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['user_id'] = $user['id'];
  echo "<script>window.location.href='dashboard.php';</script>";
} else {
  echo "<div class='alert alert-danger'>Login gagal, periksa username/password.</div>";
}
?>
