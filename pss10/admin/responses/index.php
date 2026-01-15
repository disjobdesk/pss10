<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Response PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';


requireRole(['superadmin','admin']);

$sql = "
SELECT r.id_response, u.nama, u.email,
       r.skor_total, r.level_stress, r.tanggal
FROM pss_responses r
JOIN users u ON r.id_user = u.id_user
ORDER BY r.tanggal DESC
";

$data = $pdo->query($sql)->fetchAll();
?>

<br>

<div class="mb-4 text-sm" style="text-align: justify; padding-left: 20px; padding-right: 20px;">

<h1 class="text-2xl font-bold text-teal-700 mb-2">
Data Respon PSS-10
</h1>

<div class="flex gap-3 mb-4">
  <button onclick="window.print()"
    class="bg-teal-700 text-white px-4 py-2 rounded
           hover:bg-teal-800 font-semibold">
    Cetak PDF
  </button>
</div>


<table class="w-full border text-sm">
<thead class="bg-teal-100">
<tr class="px-4 py-2">
  <th class="text-center ">Nama</th>
  <th class="text-center ">Email</th>
  <th class="text-center">Skor</th>
  <th class="text-center">Level Stres</th>
  <th class="px-4 py-2 text-center">Tanggal</th>
  <th class="no-print px-4 py-2 text-center">Detail</th>
</tr>
</thead>

<tbody>
<?php foreach ($data as $d): ?>
<tr class="border-b">
  <td class="px-4 py-2 "><?= e($d['nama']) ?></td>
  <td class=" "><?= e($d['email']) ?></td>
  <td class="text-center font-bold"><?= $d['skor_total'] ?></td>
  <td class=" ">
    <span class="px-2 py-1 rounded bg-teal-100 text-teal-700 text-xs ">
      <?= e($d['level_stress']) ?>
    </span>
  </td>
  <td class="px-4 py-2 text-center" ><?= date('d M Y H:i', strtotime($d['tanggal'])) ?></td>
  <td class="text-center px-4 py-2 no-print">
    <a href="detail.php?id=<?= $d['id_response'] ?>"
       class="px-1 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ">
       Lihat
    </a>
  </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>

<?php require '../../includes/layout/footer.php'; ?>