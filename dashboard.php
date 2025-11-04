<?php
require 'db.php';
if (!isset($_SESSION['user_id'])) { header("Location: index.php"); exit; }

$stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://unpkg.com/htmx.org@1.9.3"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light p-3">
  <div class="container-fluid">
    <span>Selamat datang, <?= htmlspecialchars($user['nama_lengkap']) ?></span>
    <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
  </div>
</nav>

<div class="container mt-4">
  <h5>Form Pendaftaran Kelas</h5>
  <form hx-post="process_registration.php" hx-target="#msg" hx-swap="innerHTML">
    <div class="mb-3">
      <label>NIM</label>
      <input name="nim" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nama Mata Kuliah</label>
      <input name="nama_mk" class="form-control" required>
    </div>
    <button class="btn btn-primary">Daftar</button>
  </form>
  <div id="msg" class="mt-2"></div>

  <hr>
  <h5>Daftar Pendaftar</h5>
  <table class="table table-bordered" id="table-pendaftar">
    <thead><tr><th>NIM</th><th>Nama MK</th><th>Waktu</th></tr></thead>
    <tbody>
      <?php
      $rows = $pdo->query("SELECT nim,nama_mk,registered_at FROM registrations ORDER BY id DESC")->fetchAll();
      foreach ($rows as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['nim']) ?></td>
        <td><?= htmlspecialchars($r['nama_mk']) ?></td>
        <td><?= htmlspecialchars($r['registered_at']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>
