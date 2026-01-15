<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Add Users PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $nama  = $_POST['nama'];
    $email = $_POST['email']; 
    $role  = $_POST['role'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare(
        "INSERT INTO users (nama,email,password,role) VALUES (?,?,?,?)"
    );
    $stmt->execute([$nama,$email,$pass,$role]);

    header('Location: index.php');
    exit;
}
?>

<div class="flex flex-col items-center justify-center">

<h2 class="text-xl font-bold mb-4 text-teal-700">Tambah User</h2>

<form method="POST" class="max-w-md space-y-3">
    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

    <input name="nama" placeholder="Nama" required class="w-full border p-2 rounded">
    <input name="email" type="email" placeholder="Email" required class="w-full border p-2 rounded">
    <input name="password" type="password" placeholder="Password" required class="w-full border p-2 rounded">

    <select name="role" class="w-full border p-2 rounded">
      <option value="user">User</option>
      <option value="admin">Admin Psikolog</option>
      <option value="superadmin">Super Admin</option>
    </select>

    <button class="bg-teal-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

</div>

<?php require '../../includes/layout/footer.php'; ?>