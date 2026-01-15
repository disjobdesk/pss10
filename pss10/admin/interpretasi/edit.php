<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "interpretasi PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin','admin']);

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "SELECT * FROM pss_interpretasi WHERE id_interpretasi = ?"
);
$stmt->execute([$id]);
$data = $stmt->fetch();

if (!$data) die('Data tidak ditemukan');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $min  = $_POST['skor_min'];
    $max  = $_POST['skor_max'];
    $lvl  = $_POST['level_stress'];
    $intp = $_POST['interpretasi'];
    $rek  = $_POST['rekomendasi'];

    $stmt = $pdo->prepare(
        "UPDATE pss_interpretasi SET
         skor_total_min=?, skor_total_max=?, level_stress=?,
         interpretasi=?, rekomendasi=?
         WHERE id_interpretasi=?"
    );
    $stmt->execute([$min,$max,$lvl,$intp,$rek,$id]);

    header('Location: index.php');
    exit;
}
?>

<div class="flex flex-col items-center justify-center">

<h2 class="text-xl font-bold text-teal-700 mb-4">
Edit Interpretasi PSS-10
</h2>

<form method="POST" class="max-w-xl space-y-3">
<input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

<div class="grid grid-cols-2 gap-3">
  <input type="number" name="skor_min"
   value="<?= $data['skor_total_min'] ?>"
   class="border p-2 rounded">
  <input type="number" name="skor_max"
   value="<?= $data['skor_total_max'] ?>"
   class="border p-2 rounded">
</div>

<input type="text" name="level_stress"
 value="<?= e($data['level_stress']) ?>"
 class="w-full border p-2 rounded">

<textarea name="interpretasi" rows="3"
 class="w-full border p-2 rounded"><?= e($data['interpretasi']) ?></textarea>

<textarea name="rekomendasi" rows="8" id=""
 class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"><?= e($data['rekomendasi']) ?></textarea>

<button class="bg-teal-600 text-white px-4 py-2 rounded">
Update
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