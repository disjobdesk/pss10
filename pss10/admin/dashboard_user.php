<?php
require '../config/database.php';
require '../config/auth.php';
require '../config/security.php';
require '../config/helpers.php';

requireRole(['user']);

$id_user = $_SESSION['user']['id_user'];

$last = $pdo->prepare("
SELECT * FROM pss_responses
WHERE id_user = ?
ORDER BY tanggal DESC
LIMIT 1
");
$last->execute([$id_user]);
$data = $last->fetch();

$title = "Dashboard Pengguna";
require '../includes/layout/header.php';
require '../includes/layout/navbar.php';

?>

<main class="max-w-4xl mx-auto px-4 py-6">

<h1 class="text-3xl font-bold text-teal-700 mb-6">
  Dashboard Pengguna
</h1>

<?php if ($data): ?>
	<div class="p-5 bg-teal-100 rounded mb-4 text-center">
		<p>Skor Terakhir:</p>
		<p class="text-3xl font-bold"><?= $data['skor_total'] ?></p>
		<p class="text-sm"><?= e($data['level_stress']) ?></p>
	</div>
	<?php else: ?>
	<p class="mb-4">Anda belum mengisi PSS-10.</p>
<?php endif; ?>

<hr class="my-6">

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
	<?php
		require '../includes/components/dashboard-card.php';

		dashboard_card(
		  'Isi Kuesioner PSS-10',
		  'Lakukan pengukuran tingkat stres Anda',
		  '../pss10/index.php',
		  'teal'
		);

				dashboard_card(
		  'Artikel Psikologi',
		  'Baca edukasi kesehatan mental',
		  '../news/index.php',
		  'teal'
		);

		dashboard_card(
		  'Interpretasi Skor',
		  'Kelola hasil & rekomendasi stres',
		  'interpretasi/index.php',
		  'tosca'
		);

		dashboard_card(
		  'Tipe Respon Stres',
		  'Kelola tipe dan indikator respon',
		  'tipe_respon/index.php',
		  'tosca'
		);

	?>
</div>

</main>


<!-- <ul class="space-y-2">
<li><a href="../pss10/index.php" class="text-teal-700 underline">
Isi Kuesioner PSS-10</a></li>
<li><a href="../news/index.php" class="text-teal-700 underline">
Artikel Psikologi</a></li>
<li><a href="../auth/logout.php" class="text-red-600 underline">
Logout</a></li>
</ul> -->

<?php require '../includes/layout/footer.php'; ?>