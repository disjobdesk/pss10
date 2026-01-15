<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../config/security.php';
require '../config/database.php';
require '../helpers/csrf_helper.php';

/* Cegah cache agar tidak bisa back ke admin */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// PROSES LOGIN

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $error = "Email tidak ditemukan";
    } elseif (!password_verify($password, $user['password'])) {
        $error = "Password salah";
    } else {
        session_regenerate_id(true);

        $_SESSION['user'] = [
            'id_user' => $user['id_user'],
            'nama'    => $user['nama'],
            'email'   => $user['email'],
            'role'    => $user['role']
        ];

        // REDIRECT SESUAI ROLE

        switch ($user['role']) {
            case 'superadmin':
                header('Location: ../admin/dashboard.php');
                break;
            case 'admin':
                header('Location: ../admin/dashboard_admin.php');
                break;
            default:
                header('Location: ../admin/dashboard_user.php');
        }
        exit;
    }
}
?>

<!-- <form method="POST">
    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

    <input type="email" name="email" required>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
 -->

 <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tema Warna -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            tealsoft: '#e6fffa',
            tosca: '#2dd4bf'
          }
        }
      }
    }
  </script>
</head>

<body class="bg-tealsoft min-h-screen flex items-center justify-center px-4">

<!-- Card Login -->
<div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 border border-teal-200">
<!-- 
  <h1 class="text-3xl font-bold text-teal-700 text-center mb-2">
    Login PSS-10
  </h1>

  <p class="text-center text-lg text-gray-600 mb-6">
    Sistem Pengukuran Tingkat Stres
  </p> -->

  <p class="text-gray-600 text-lg">
        Kembali ke
        <a href="../index.php"
            class="inline-flex items-center justify-center gap-2 text-teal-700 text-lg font-semibold
                hover:underline">  Beranda
        </a>
    </p>

  <!-- ALERT ERROR -->
  <?php if (!empty($error)): ?>
    <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded-xl text-lg">
      <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <!-- FORM LOGIN -->
  <form method="POST" class="space-y-4">

    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

    <div>
      <label class="block text-lg font-semibold mb-1">
        Email
      </label>
      <input type="email" name="email" required
             class="w-full px-4 py-3 border rounded-xl text-lg
                    focus:outline-none focus:ring-2 focus:ring-teal-400">
    </div>

    <div>
      <label class="block text-lg font-semibold mb-1">
        Password
      </label>
      <input type="password" name="password" required
             class="w-full px-4 py-3 border rounded-xl text-lg
                    focus:outline-none focus:ring-2 focus:ring-teal-400">
    </div>

    <button type="submit"
            class="w-full bg-teal-600 hover:bg-teal-700
                   text-white py-3 rounded-xl
                   font-bold text-lg transition">
      Masuk
    </button>

  </form>

  <div class="mt-6 text-center text-base text-gray-600">
    © <?= date('Y') ?>
  </div>

</div>

</body>
</html>