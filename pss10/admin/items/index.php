<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Item PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin','admin']);

$items = $pdo->query(
    "SELECT * FROM pss_items ORDER BY nomor_item ASC"
)->fetchAll();
?>

<br>

<div class="mb-4 text-sm" style="text-align: justify; padding-left: 20px; padding-right: 20px;">

<h1 class="text-2xl font-bold text-teal-700 mb-4">Item PSS-10</h1>


<a href="add.php" class="bg-teal-600 text-white px-4 py-2 rounded mb-3 inline-block">
Tambah Item
</a>

<?php require '../../includes/components/table.php'; ?>

<table class="w-full border text-sm">
<thead class="bg-teal-100">
<tr>
  <th class="p-2">No</th>
  <th>Pernyataan</th>
  <th>Reverse</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php foreach ($items as $item): ?>
<tr class="border-b">
  <td class="p-2 text-center"><?= $item['nomor_item'] ?></td>
  <td><?= e($item['pernyataan']) ?></td>
  <td class="text-center">
    <?= $item['is_reverse'] ? 'Ya' : 'Tidak' ?>
  </td>
  
  <td class="text-center">
    <!-- <a href="edit.php?id=<?= $item['id_item'] ?>" class="text-blue-600">Edit</a>  -->
    <a href="edit.php?id=<?= $item['id_item'] ?>" class="px-1 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ">
    <!-- Anda bisa menambahkan ikon di sini, misalnya dari Heroicons atau FontAwesome -->
    Edit
    </a>
    
    | 
    
<!--     <form action="delete.php" method="POST" class="inline">
      <input type="hidden" name="id" value="<?= $item['id_item'] ?>">
      <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
      <!-- <button onclick="return confirm('Hapus item?')" class="text-red-600"> -->
      <!-- <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
        Hapus
      </button> -->
    <!-- </form> --> 

<!-- PENTING SESUAI DENGAN AUDIT tombol Hapus untuk item nomor 1–10 menjadi DISABLED  -->
    
    <?php if ($item['nomor_item'] <= 10): ?>
    <!-- DISABLED -->
      <button
        class="bg-gray-400 text-white font-bold py-1 px-2 rounded cursor-not-allowed"
        disabled
        title="Item baku PSS-10 tidak boleh dihapus">
        Hapus
      </button>
    <?php else: ?>
    
    <!-- AKTIF -->
      <form action="delete.php" method="POST" class="inline">
        <input type="hidden" name="id" value="<?= $item['id_item'] ?>">
        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
        <button
          onclick="return confirm('Hapus item?')"
          class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
          Hapus
        </button>
      </form>
    <?php endif; ?>

  </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>

<?php require '../../includes/layout/footer.php'; ?>
