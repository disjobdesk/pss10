<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Response PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin','admin']);

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("
SELECT r.*, u.nama, u.email
FROM pss_responses r
JOIN users u ON r.id_user = u.id_user
WHERE r.id_response = ?
");
$stmt->execute([$id]);
$header = $stmt->fetch();

if (!$header) die('Data tidak ditemukan');

$detail = $pdo->prepare("
SELECT i.nomor_item, i.pernyataan, d.skor
FROM pss_response_detail d
JOIN pss_items i ON d.id_item = i.id_item
WHERE d.id_response = ?
ORDER BY i.nomor_item ASC
");
$detail->execute([$id]);
$items = $detail->fetchAll();
?>


<br>

<div class="mb-4 text-sm" style="text-align: justify; padding-left: 20px; padding-right: 20px;">

<h1 class="text-2xl font-bold text-teal-700 mb-2">
Detail Respon PSS-10
</h1>

<div class="mb-4 text-sm" style="padding-left: 20px;">
<strong style="font-size: 14px;">Nama:</strong> <?= e($header['nama']) ?><br>
<strong>Email:</strong> <?= e($header['email']) ?><br>
<strong>Skor Total:</strong> <?= $header['skor_total'] ?><br>
<strong>Level Stres:</strong>
<span class="bg-teal-100 px-2 py-1 rounded text-teal-700">
<?= e($header['level_stress']) ?>
</span>
</div>

<div class="flex flex-col items-center justify-center">

<table class="w-full border text-sm">
<thead class="bg-teal-100">
<tr>
  <th class="p-2">No</th>
  <th>Pernyataan</th>
  <th>Skor</th>
</tr>
</thead>
<tbody>
<?php foreach ($items as $i): ?>
<tr class="border-b">
  <td class="p-2 text-center"><?= $i['nomor_item'] ?></td>
  <td><?= e($i['pernyataan']) ?></td>
  <td class="text-center font-semibold"><?= $i['skor'] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>



<br>

<div class="flex gap-3 mb-4">
  <button onclick="window.print()"
    class="bg-teal-700 text-white px-4 py-2 rounded
           hover:bg-teal-800 font-semibold">
    Cetak PDF
  </button>

  <a href="index.php"
     class="bg-teal-600 text-white px-4 py-2 rounded
            hover:bg-teal-700 font-semibold">
    Kembali
  </a>
</div>


</div>

<?php require '../../includes/layout/footer.php'; ?>