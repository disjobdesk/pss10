<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "interpretasi PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin','admin']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $min  = $_POST['skor_min'];
    $max  = $_POST['skor_max'];
    $lvl  = $_POST['level_stress'];
    $intp = $_POST['interpretasi'];
    $rek  = $_POST['rekomendasi'];

    $stmt = $pdo->prepare(
        "INSERT INTO pss_interpretasi
        (skor_total_min, skor_total_max, level_stress, interpretasi, rekomendasi)
        VALUES (?,?,?,?,?)"
    );
    $stmt->execute([$min,$max,$lvl,$intp,$rek]);

    header('Location: index.php');
    exit;
}
?>

<div class="flex flex-col items-center justify-center">

<h2 class="text-xl font-bold text-teal-700 mb-4">
Tambah Interpretasi PSS-10
</h2>

<form method="POST" class="max-w-xl space-y-3">
<input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

<div class="grid grid-cols-2 gap-3">
  <input type="number" name="skor_min" placeholder="Skor Minimum"
   required class="border p-2 rounded">
  <input type="number" name="skor_max" placeholder="Skor Maksimum"
   required class="border p-2 rounded">
</div>

<input type="text" name="level_stress"
 placeholder="Level Stres (contoh: Stres Sedang)"
 required class="w-full border p-2 rounded">

<textarea name="interpretasi" rows="4"
 placeholder="Interpretasi psikologis"
 required class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"></textarea>

<textarea name="rekomendasi" rows="8" id=""
 placeholder="Rekomendasi"
 required class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" oninput="updateLineNumbers()"
    onscroll="syncScroll()"></textarea>

<button class="bg-teal-600 text-white px-4 py-2 rounded">
Simpan
</button>
</form>

</div>

<?php require '../../includes/layout/footer.php'; ?>


<!-- numbering tambahkan id='numberText' pada text area -->
<script>
document.getElementById('numberText').addEventListener('keydown', function(e) {
  if (e.key === 'Enter') {
    e.preventDefault();
    const lines = this.value.split('\n').length + 1;
    this.value += '\n' + lines + '. ';
  }
});
</script>

<!-- Bullets -->
<script>
document.getElementById('bulletText').addEventListener('keydown', function(e) {
  if (e.key === 'Enter') {
    e.preventDefault();
    this.value += '\n• ';
  }
});
</script>