<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "User PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';


requireRole(['superadmin']);

$users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();
?>


<div class="mb-4 text-sm" style="text-align: justify; padding-left: 20px; padding-right: 20px;">
<h1 class="text-2xl font-bold mb-4 text-teal-700">Manajemen Users</h1>

<a href="add.php" class="bg-teal-600 text-white px-4 py-2 rounded">Tambah User</a>

<table class="w-full mt-4 border">
<thead class="bg-teal-100">
<tr>
  <th class="p-1">Nama</th>
  <th>Email</th>
  <th>Role</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php foreach ($users as $u): ?>
<tr class="border-b">
  <td class="p-2"><?= e($u['nama']) ?></td>
  <td><?= e($u['email']) ?></td>
  <td class="capitalize"><?= e($u['role']) ?></td>
  <td>
    <a href="edit.php?id=<?= $u['id_user'] ?>" class="px-1 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ">Edit</a> |
   

    <form action="delete.php" method="POST" class="inline">
      <input type="hidden" name="id" value="<?= $u['id_user'] ?>">
      <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

      <button onclick="return confirm('Hapus user?')"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded">Hapus</button>
    </form>

  </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>


<?php require '../../includes/layout/footer.php'; ?>