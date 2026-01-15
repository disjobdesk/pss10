<?php
require '../config/database.php';
require '../config/security.php';
require '../config/helpers.php';
require '../config/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $nama     = trim($_POST['nama']);
    $email    = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare(
        "INSERT INTO users (nama,email,password,role) VALUES (?,?,?,?)"
    );
    $stmt->execute([$nama,$email,$password,'user']);

    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi User | PSS-10</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

  <!-- HEADER -->
  <div class="text-center mb-6">
    <h1 class="text-3xl font-bold text-teal-700">
      Daftar Akun
    </h1>
    <p class="text-gray-600 mt-2">
      Buat akun untuk mengikuti tes PSS-10
    </p>
  </div>

  <!-- FORM -->
  <form method="POST" class="space-y-5">

    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

    <!-- NAMA -->
    <div>
      <label class="block text-lg font-semibold mb-1">
        Nama Lengkap
      </label>
      <input type="text" name="nama" required
        class="w-full px-4 py-3 border rounded-xl text-lg
               focus:outline-none focus:ring-2 focus:ring-teal-500">
    </div>

    <!-- EMAIL -->
    <div>
      <label class="block text-lg font-semibold mb-1">
        Email
      </label>
      <input type="email" name="email" required
        class="w-full px-4 py-3 border rounded-xl text-lg
               focus:outline-none focus:ring-2 focus:ring-teal-500">
    </div>

    <!-- PASSWORD -->
    <div>
      <label class="block text-lg font-semibold mb-1">
        Password
      </label>
      <input type="password" name="password" required
        class="w-full px-4 py-3 border rounded-xl text-lg
               focus:outline-none focus:ring-2 focus:ring-teal-500">
    </div>

    <!-- SUBMIT -->
    <button type="submit"
      class="w-full bg-teal-600 text-white py-3 rounded-xl
             text-lg font-bold hover:bg-teal-700 transition">
      Daftar
    </button>

  </form>

<!-- FOOTER -->
<div class="text-center mt-6 space-y-3">

  <!-- KEMBALI KE LANDING PAGE -->
    <p class="text-gray-600 text-lg">
        Kembali ke
        <a href="../index.php"
            class="inline-flex items-center justify-center gap-2 text-teal-700 text-lg font-semibold
                hover:underline">  Beranda
        </a>
    </p>

  <p class="text-gray-600 text-lg">
    Sudah punya akun?
    <a href="login.php"
       class="text-teal-700 font-semibold hover:underline">
      Login
    </a>
  </p>

</div>


</body>
</html>
