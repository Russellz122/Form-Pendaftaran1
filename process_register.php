<?php
require 'db.php';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$nama = $_POST['nama_lengkap'] ?? '';

if (!$username || !$password || !$nama) {
  echo "<div class='alert alert-danger'>Semua field wajib diisi.</div>";
  exit;
}

$stmt = $pdo->prepare("SELECT id FROM users WHERE username=?");
$stmt->execute([$username]);
if ($stmt->fetch()) {
  echo "<div class='alert alert-warning'>Username sudah digunakan.</div>";
  exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (username,password,nama_lengkap) VALUES (?,?,?)");
$stmt->execute([$username,$hash,$nama]);
echo "<div class='alert alert-success'>Akun berhasil dibuat, silakan login.</div>";
?>
