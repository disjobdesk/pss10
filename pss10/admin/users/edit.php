<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Edit Users PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin']);

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id_user = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) die('User tidak ditemukan');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if (!empty($_POST['password'])) {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET nama=?, email=?, role=?, password=? WHERE id_user=?";
        $pdo->prepare($sql)->execute([$nama,$email,$role,$pass,$id]);
    } else {
        $sql = "UPDATE users SET nama=?, email=?, role=? WHERE id_user=?";
        $pdo->prepare($sql)->execute([$nama,$email,$role,$id]);
    }

    header('Location: index.php');
    exit;
}
?>

<div class="flex flex-col items-center justify-center">

<h2 class="text-xl font-bold mb-4 text-teal-700">Edit User</h2>

<form method="POST" class="max-w-md space-y-3">
<input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

<input name="nama" value="<?= e($user['nama']) ?>" class="w-full border p-2 rounded">
<input name="email" type="email" value="<?= e($user['email']) ?>" class="w-full border p-2 rounded">

<input name="password" type="password" placeholder="Password baru (opsional)"
 class="w-full border p-2 rounded">

<select name="role" class="w-full border p-2 rounded">
  <option value="user" <?= $user['role']=='user'?'selected':'' ?>>User</option>
  <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin Psikolog</option>
  <option value="superadmin" <?= $user['role']=='superadmin'?'selected':'' ?>>Super Admin</option>
</select>

<button class="bg-teal-600 text-white px-4 py-2 rounded">Update</button>
</form>

</div>
<?php require '../../includes/layout/footer.php'; ?>