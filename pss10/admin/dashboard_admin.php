<?php
require '../config/database.php';
require '../config/auth.php';
require '../config/security.php';
require '../config/helpers.php';

requireRole(['admin']);

$data = $pdo->query("
SELECT level_stress, COUNT(*) total
FROM pss_responses
GROUP BY level_stress
")->fetchAll();

$title = "Dashboard Admin Psikolog";
require '../includes/layout/header.php';
require '../includes/layout/navbar.php';

?>

<main class="max-w-6xl mx-auto px-4 py-6">

<h1 class="text-3xl font-bold text-teal-700 mb-6">
  Dashboard Admin Psikolog
</h1>

<div class="grid md:grid-cols-4 gap-4">
	<?php foreach ($data as $d): ?>
<div class="p-4 bg-teal-100 rounded text-center">
	<p class="text-sm"><?= e($d['level_stress']) ?></p>
	<p class="text-3xl font-bold"><?= $d['total'] ?></p>
</div>
	<?php endforeach; ?>
</div>

<hr class="my-6">

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
	<?php
	require '../includes/components/dashboard-card.php';

		dashboard_card(
		  'Artikel Psikologi',
		  'Kelola Artikel Psikologi',
		  'news/index.php'
		);

		dashboard_card(
		  'Interpretasi Skor',
		  'Kelola hasil & rekomendasi stres',
		  'interpretasi/index.php',
		  'tosca'
		);

		dashboard_card(
		  'Tipe Respon Stres',
		  'Kelola indikator respon stres',
		  'tipe_respon/index.php'
		);

		dashboard_card(
		  'Hasil Respon User',
		  'Pantau hasil pengisian PSS-10',
		  'responses/index.php',
		  'tosca'
		);
	?>
</div>

</main>


<!-- <h1 class="text-2xl font-bold text-teal-700 mb-6">
Dashboard Psikolog
</h1> -->



<!-- <ul class="space-y-2">
<li><a href="responses/index.php" class="text-teal-700 underline">
Data Respon PSS-10</a></li>
<li><a href="interpretasi/index.php" class="text-teal-700 underline">
Interpretasi Skor</a></li>
<li><a href="tipe_respon/index.php" class="text-teal-700 underline">
Tipe Respon Stres</a></li> -->
<!-- menuju ke artikel tanpa bisa mengedit -->
<!-- <li><a href="../news/index.php" class="text-teal-700 underline"> 
Artikel Psikologi</a></li>
</ul> -->

<?php require '../includes/layout/footer.php'; ?>