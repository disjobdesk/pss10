<?php
require '../config/database.php';
require '../config/auth.php';
require '../config/security.php';
require '../config/helpers.php';

requireRole(['superadmin']);

$totalUser = $pdo->query(
    "SELECT COUNT(*) FROM users"
)->fetchColumn();

$totalRespon = $pdo->query(
    "SELECT COUNT(*) FROM pss_responses"
)->fetchColumn();

$totalBerita = $pdo->query(
    "SELECT COUNT(*) FROM news"
)->fetchColumn();

//untuk cek logika
// echo '<pre>';
// print_r($_SESSION);
// exit;

$title = "Dashboard Super Admin";
require '../includes/layout/header.php';
require '../includes/layout/navbar.php';

?>

<main class="max-w-7xl mx-auto px-4 py-6">

<h1 class="text-3xl font-bold text-teal-700 mb-6">
  Dashboard Super Admin
</h1>

<div class="grid md:grid-cols-3 gap-4">
    <div class="p-4 bg-teal-100 rounded text-center">
        <p class="text-sm">Total User</p>
        <p class="text-3xl font-bold"><?= $totalUser ?></p>
    </div>

    <div class="p-4 bg-teal-100 rounded text-center">
        <p class="text-sm">Total Respon PSS-10</p>
        <p class="text-3xl font-bold"><?= $totalRespon ?></p>
    </div>

    <div class="p-4 bg-teal-100 rounded text-center">
        <p class="text-sm">Total Berita</p>
        <p class="text-3xl font-bold"><?= $totalBerita ?></p>
    </div>
</div>
<hr class="my-6">

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

<?php
require '../includes/components/dashboard-card.php';

dashboard_card(
  'Manajemen User',
  'Tambah, ubah, dan kelola akun pengguna',
  'users/index.php',
  'teal'
);

dashboard_card(
  'Item PSS-10',
  'Kelola pernyataan kuesioner PSS-10',
  'items/index.php',
  'tosca'
);

dashboard_card(
  'Interpretasi Skor',
  'Kelola level stres & rekomendasi',
  'interpretasi/index.php',
  'teal'
);

dashboard_card(
  'Tipe Respon Stres',
  'Kelola tipe dan indikator respon',
  'tipe_respon/index.php',
  'tosca'
);

dashboard_card(
  'Berita Psikologi',
  'Kelola artikel dan edukasi psikologi',
  'news/index.php',
  'teal'
);

dashboard_card(
  'Hasil Respon User',
  'Lihat hasil pengisian PSS-10',
  'responses/index.php',
  'tosca'
);
?>

</div>

</main>

<!-- <hr class="my-6"> -->

<!-- <ul class="space-y-2">
    <li><a href="users/index.php" class="text-teal-700 underline">Manajemen User</a></li>
    <li><a href="items/index.php" class="text-teal-700 underline">Item PSS-10</a></li>
    <li><a href="interpretasi/index.php" class="text-teal-700 underline">Interpretasi Skor</a></li>
    <li><a href="tipe_respon/index.php" class="text-teal-700 underline">Tipe Respon Stres</a></li>
    <li><a href="responses/index.php" class="text-teal-700 underline">Data Respon User</a></li>
    <li><a href="news/index.php" class="text-teal-700 underline">Berita Psikologi</a></li>
</ul> -->


<?php require '../includes/layout/footer.php'; ?>