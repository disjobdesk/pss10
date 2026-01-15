<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Edit Tipe Respon PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';


requireRole(['superadmin','admin']);

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "SELECT * FROM tipe_respon_stres WHERE id_respon = ?"
);
$stmt->execute([$id]);
$data = $stmt->fetch();

if (!$data) die('Data tidak ditemukan');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $tipe = $_POST['tipe_respon'];
    $kode = $_POST['kode'];
    $indikator = $_POST['indikator'];

    $stmt = $pdo->prepare(
        "UPDATE tipe_respon_stres
         SET tipe_respon = ?, kode = ?, indikator = ?
         WHERE id_respon = ?"
    );
    $stmt->execute([$tipe, $kode, $indikator, $id]);

    header('Location: index.php');
    exit;
}
?>

<div class="flex flex-col items-center justify-center">

<h2 class="text-xl font-bold text-teal-700 mb-4">
Edit Tipe Respon Stres
</h2>

<form method="POST" class="max-w-lg space-y-3">
<input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

<input type="text" name="kode"
 value="<?= e($data['kode']) ?>"
 class="w-full border p-2 rounded">

<input type="text" name="tipe_respon"
 value="<?= e($data['tipe_respon']) ?>"
 class="w-full border p-2 rounded">

<textarea name="indikator" rows="4"
 class="w-full border p-2 rounded"><?= e($data['indikator']) ?></textarea>

<button class="bg-teal-600 text-white px-4 py-2 rounded">
Update
</button>
</form>

</div>


<?php require '../../includes/layout/footer.php'; ?>