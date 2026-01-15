<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Tipe Respon PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';


// requireRole(['superadmin','admin']);
requireRole(['superadmin','admin','user']);
$isAdmin = in_array($_SESSION['user']['role'], ['superadmin','admin']);



$stmt = $pdo->query("SELECT * FROM tipe_respon_stres ORDER BY kode ASC");
$data = $stmt->fetchAll();
?>

<br>

<div class="mb-4 text-sm" style="text-align: justify; padding-left: 20px; padding-right: 20px;">

<h1 class="text-2xl font-bold text-teal-700 mb-4">
Tipe Respon Stres
</h1>

<!-- <a href="add.php"
 class="bg-teal-600 text-white px-4 py-2 rounded mb-3 inline-block">
+ Tambah Tipe Respon
</a> -->
<?php if ($isAdmin): ?>
<a href="add.php"
 class="bg-teal-600 text-white px-4 py-2 rounded mb-3 inline-block">
Tambah Tipe Respon
</a>
<?php endif; ?>



<table class="w-full border text-sm">
  
  <thead class="bg-teal-100">
    <tr>
      <th class="p-2">Kode</th>
      <th>Tipe Respon</th>
      <th>Indikator</th>
      <!-- <th width="15%">Aksi</th> -->
      <?php if ($isAdmin): ?>
        <th width="15%">Aksi</th>
      <?php endif; ?>

    </tr>
  </thead>

  <tbody>
    <?php foreach ($data as $row): ?>
        <tr class="border-b align-top">
          <td class="p-2 font-semibold"><?= e($row['kode']) ?></td>
          <td><?= e($row['tipe_respon']) ?></td>
          <td><?= e($row['indikator']) ?></td>
        
      <!--   <td class="text-center">
          <a href="edit.php?id=<?= $row['id_respon'] ?>" class="text-blue-600">Edit</a>
          |
          <form method="POST" action="delete.php" class="inline">
            <input type="hidden" name="id_respon" value="<?= $row['id_respon'] ?>">
            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
            <button onclick="return confirm('Hapus data?')" class="text-red-600">
              Hapus
            </button>
          </form>
        </td> -->
        <?php if ($isAdmin): ?>
          <td class="text-center">
            <a href="edit.php?id=<?= $row['id_respon'] ?>"
               class="px-1 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ">Edit</a>
            |
            <form method="POST" action="delete.php" class="inline">
              <input type="hidden" name="id_respon" value="<?= $row['id_respon'] ?>">
              <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
              <button onclick="return confirm('Hapus data?')"
                      class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                Hapus
              </button>
            </form>
          </td>
        <?php endif; ?>

      </tr>
    <?php endforeach; ?>
  
    <?php if (!$isAdmin): ?>
      <p class="text-sm text-gray-500 mb-3">
        Informasi ini bersifat edukatif
      </p>
    <?php endif; ?> 

  </tbody>

</table>

</div>



<?php require '../../includes/layout/footer.php'; ?>