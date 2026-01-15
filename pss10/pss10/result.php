<?php
require '../config/database.php';
require '../config/auth.php';
require '../config/security.php';
require '../config/helpers.php';
require '../includes/layout/header.php';

requireLogin();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID tidak valid');
}

$id = (int) $_GET['id'];

// $id = $_GET['id'];

$stmt = $pdo->prepare(
    "SELECT r.*, i.interpretasi, i.rekomendasi
     FROM pss_responses r
     JOIN pss_interpretasi i
       ON r.skor_total BETWEEN i.skor_total_min AND i.skor_total_max
     WHERE r.id_response = ? AND r.id_user = ?"
);

$stmt->execute([$id, $_SESSION['user']['id_user']]);
$data = $stmt->fetch();

if (!$data) die('Data tidak ditemukan');
?>



<h1 class="text-2xl font-bold text-teal-700 mb-4">
Hasil PSS-10
</h1>

<div class="border rounded p-4 space-y-2">
<p><strong>Skor Total:</strong> <?= $data['skor_total'] ?></p>

<p>
<strong>Level Stres:</strong>
<span class="bg-teal-100 text-teal-700 px-2 py-1 rounded">
<?= e($data['level_stress']) ?>
</span>
</p>

<p><strong>Interpretasi:</strong><br>
<?= nl2br(e($data['interpretasi'])) ?></p>


<p><strong>Rekomendasi:</strong><br>
<?= nl2br(e($data['rekomendasi'])) ?></p>
</div>

<?php require '../includes/layout/footer.php'; ?>