<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Add Tipe Respon PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';


requireRole(['superadmin','admin']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $tipe = $_POST['tipe_respon'];
    $kode = $_POST['kode'];
    $indikator = $_POST['indikator'];

    $stmt = $pdo->prepare(
        "INSERT INTO tipe_respon_stres (tipe_respon, kode, indikator)
         VALUES (?, ?, ?)"
    );
    $stmt->execute([$tipe, $kode, $indikator]);

    header('Location: index.php');
    exit;
}
?>

<div class="flex flex-col items-center justify-center">

<h2 class="text-xl font-bold text-teal-700 mb-4">
Tambah Tipe Respon Stres
</h2>

<form method="POST" class="max-w-lg space-y-3">
<input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

<input type="text" name="kode"
 placeholder="Contoh: EMO"
 required
 class="w-full border p-2 rounded">

<input type="text" name="tipe_respon"
 placeholder="Contoh: Respon Emosional"
 required
 class="w-full border p-2 rounded">

<textarea name="indikator" rows="4"
 placeholder="Contoh: Mudah marah, cemas, merasa tertekan"
 required
 class="w-full border p-2 rounded"></textarea>

<button class="bg-teal-600 text-white px-4 py-2 rounded">
Simpan
</button>
</form>

</div>


<?php require '../../includes/layout/footer.php'; ?>