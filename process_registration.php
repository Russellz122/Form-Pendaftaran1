<?php
require 'db.php';
if (!isset($_SESSION['user_id'])) exit("Sesi tidak valid.");

$nim = $_POST['nim'] ?? '';
$nama_mk = $_POST['nama_mk'] ?? '';

if (!$nim || !$nama_mk) {
  echo "<div class='alert alert-danger'>Semua field wajib diisi.</div>";
  exit;
}

$stmt = $pdo->prepare("INSERT INTO registrations (user_id, nim, nama_mk) VALUES (?,?,?)");
$stmt->execute([$_SESSION['user_id'], $nim, $nama_mk]);

echo "<div class='alert alert-success'>Pendaftaran berhasil!</div>";
echo "
<script>
  const row = `<tr><td>".htmlspecialchars($nim)."</td><td>".htmlspecialchars($nama_mk)."</td><td>Baru saja</td></tr>`;
  document.querySelector('#table-pendaftar tbody').insertAdjacentHTML('afterbegin', row);
</script>";
?>
