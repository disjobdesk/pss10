<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "News Admin PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin','admin']);

$data = $pdo->query(
    "SELECT * FROM news ORDER BY created_at DESC"
)->fetchAll();
?>

<br>

<div class="mb-4 text-sm" style="text-align: justify; padding-left: 20px; padding-right: 20px;">

<h1 class="text-2xl font-bold text-teal-700 mb-4">
Manajemen Berita
</h1>

<a href="add.php"
 class="bg-teal-600 text-white px-4 py-2 rounded mb-3 inline-block">
Tambah Berita
</a>

<table class="w-full border text-sm">
<thead class="bg-teal-100">
<tr>
  <th class="p-2">Judul</th>
  <th>Slug</th>
  <th>Tanggal</th>
  <th width="15%">Aksi</th>
</tr>
</thead>

<tbody>

<?php foreach ($data as $row): ?>
<tr class="border-b">
  <td class="p-2 font-semibold"><?= e($row['judul']) ?></td>
  <td><?= e($row['slug']) ?></td>
  <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
  
<!--   <td class="text-center">
    <a href="edit.php?id=<?= $row['id_news'] ?>"  class="px-1 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ">Edit</a>
    |
    <form method="POST" action="delete.php" class="inline">
      <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
      <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
      <button onclick="return confirm('Hapus berita?')"
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Hapus</button>
    </form>
  </td> -->

  <td class="text-center space-x-1">

  <!-- DETAIL BERITA (PUBLIK) -->
  <a href="/pss10/news/detail.php?slug=<?= e($row['slug']) ?>"
     target="_blank"
     class="inline-block px-2 py-1 text-xs font-semibold
            text-white bg-teal-600 rounded-lg
            hover:bg-teal-700 transition">
     Detail
  </a>

  <!-- EDIT -->
  <a href="edit.php?id=<?= $row['id_news'] ?>"
     class="inline-block px-2 py-1 text-xs font-semibold
            text-white bg-blue-600 rounded-lg
            hover:bg-blue-700 transition">
     Edit
  </a>

  <!-- DELETE -->
  <form method="POST" action="delete.php" class="inline">
    <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
    <button onclick="return confirm('Hapus berita?')"
      class="px-2 py-1 text-xs font-semibold
             text-white bg-red-600 rounded-lg
             hover:bg-red-700 transition">
      Hapus
    </button>
  </form>

</td>


</tr>
<?php endforeach; ?>

</tbody>
</table>

</div>

<?php require '../../includes/layout/footer.php'; ?>
