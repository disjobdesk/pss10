<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "interpretasi PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

// requireRole(['superadmin','admin']);
// requireRole(['superadmin','admin']);

requireRole(['superadmin','admin','user']);
$isAdmin = in_array($_SESSION['user']['role'], ['superadmin','admin']);

$data = $pdo->query(
    "SELECT * FROM pss_interpretasi ORDER BY skor_total_min ASC"
)->fetchAll();
?>

<br>

<div class="mb-4 text-sm" style="text-align: justify; padding-left: 20px; padding-right: 20px;">

<h1 class="text-2xl font-bold text-teal-700 mb-4">
Interpretasi Skor PSS-10
</h1>

<!-- <a href="add.php"
 class="bg-teal-600 text-white px-4 py-2 rounded inline-block mb-3">
+ Tambah Interpretasi
</a> -->
<?php if ($isAdmin): ?>
<a href="add.php"
 class="bg-teal-600 text-white px-4 py-2 rounded inline-block mb-3">
  Tambah Interpretasi
</a>
<?php endif; ?>




<table class="w-full border text-sm">
<thead class="bg-teal-100">
<tr>
  <th class="p-2">Rentang Skor</th>
  <th>Level Stres</th>
  <th>Interpretasi</th>
  <th>Rekomendasi</th>
  <!-- <th>Aksi</th> -->
  <?php if ($isAdmin): ?>
    <th>Aksi</th>
  <?php endif; ?>

</tr>
</thead>
<tbody>
<?php foreach ($data as $d): ?>
<tr class="border-b align-top">
  <td class="p-2 text-center px-4 py-3 align-top">
    <?= $d['skor_total_min'] ?> – <?= $d['skor_total_max'] ?>
  </td>
  <td class="font-semibold px-4 py-3 align-top"><?= e($d['level_stress']) ?></td>
  <td class="px-4 py-3 align-top"><?= e($d['interpretasi']) ?></td>
  

  <td class="px-4 py-3 align-top">
    <ul class="list-disc list-inside text-justify leading-relaxed space-y-1">
        <!-- <?= e($d['rekomendasi']) ?> -->
        <?php foreach (explode("\n", e($d['rekomendasi'])) as $item): ?>
      <?php if (trim($item) !== ''): ?>
        <li><?= e(trim($item)) ?></li> 
      <?php endif; ?>
    <?php endforeach; ?>
    </ul>
  </td>
  
 <!--  <td class="text-center">
    <a href="edit.php?id=<?= $d['id_interpretasi'] ?>"
       class="text-blue-600">Edit</a>
    |
    <form action="delete.php" method="POST" class="inline">
      <input type="hidden" name="id" value="<?= $d['id_interpretasi'] ?>">
      <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
      <button onclick="return confirm('Hapus interpretasi?')"
        class="text-red-600">Hapus</button>
    </form>
  </td> -->
  <?php if ($isAdmin): ?>
    <td class="text-center">
      <a href="edit.php?id=<?= $d['id_interpretasi'] ?>"
         class="px-1 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ">Edit</a>
      |
      <form action="delete.php" method="POST" class="inline">
        <input type="hidden" name="id" value="<?= $d['id_interpretasi'] ?>">
        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
        <button onclick="return confirm('Hapus interpretasi?')"
          class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded">Hapus</button>
      </form>
    </td>
  <?php endif; ?>
</tr>


<?php endforeach; ?>

  <?php if (!$isAdmin): ?>
      <p class="text-gray-500 text-sm mb-3">
        Data interpretasi bersifat informatif
      </p>
  <?php endif; ?>

</tbody>
</table>

</div>  

<?php require '../../includes/layout/footer.php'; ?>
