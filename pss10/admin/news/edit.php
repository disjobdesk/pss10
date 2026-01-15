<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Item PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin','admin']);

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM news WHERE id_news = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if (!$data) die('Berita tidak ditemukan');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $judul = $_POST['judul'];
    $slug  = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));
    $isi   = $_POST['isi'];

    $stmt = $pdo->prepare(
        "UPDATE news
         SET judul = ?, slug = ?, isi = ?
         WHERE id_news = ?"
    );
    $stmt->execute([$judul, $slug, $isi, $id]);

    header('Location: index.php');
    exit;
}
?>

<div class="flex flex-col items-center justify-center">

<h2 class="text-xl font-bold text-teal-700 mb-4">
Edit Berita
</h2>

<form method="POST" class="max-w-2xl space-y-3">
<input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

<input type="text" name="judul"
 value="<?= e($data['judul']) ?>"
 class="w-full border p-2 rounded">

<textarea name="isi" rows="8"
 class="w-full border p-2 rounded"><?= e($data['isi']) ?></textarea>

<button class="bg-teal-600 text-white px-4 py-2 rounded">
Update
</button>
</form>

</div>

<?php require '../../includes/layout/footer.php'; ?>