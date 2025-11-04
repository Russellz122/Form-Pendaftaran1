<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pendaftaran Kelas Khusus</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://unpkg.com/htmx.org@1.9.3"></script>
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card p-4 shadow-sm">
    <h4 class="mb-3 text-center">Pendaftaran Kelas Khusus</h4>
    
    <div id="login-area">
      <form hx-post="process_login.php" hx-target="#login-msg" hx-swap="innerHTML">
        <div class="mb-3">
          <label>Username</label>
          <input name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
      </form>
      <div id="login-msg" class="mt-2 text-danger"></div>
      <hr>
      <button class="btn btn-link w-100" hx-get="register_form.html" hx-target="#register-area" hx-swap="innerHTML">Buat akun baru</button>
    </div>

    <div id="register-area" class="mt-3"></div>
  </div>
</div>
</body>
</html>
