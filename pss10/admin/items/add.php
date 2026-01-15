<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Item PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin','admin']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $nomor = $_POST['nomor_item'];
    $teks  = $_POST['pernyataan'];
    $rev   = $_POST['is_reverse'] ?? 0;

    $stmt = $pdo->prepare(
        "INSERT INTO pss_items (nomor_item, pernyataan, is_reverse)
         VALUES (?,?,?)"
    );
    $stmt->execute([$nomor,$teks,$rev]);

    header('Location: index.php');
    exit;
}
?>

<br>

<div class="flex flex-col items-center justify-center">
    <h2 class="text-xl font-bold text-teal-700 mb-4">Tambah Item PSS-10</h2>

    <form method="POST" class="max-w-xl space-y-3">
        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

        <label>Nomor Item</label>
        <input type="number" name="nomor_item" required
         class="w-full border p-2 rounded">

        <label>Pernyataan</label>
        <textarea name="pernyataan" required
         class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
          rows="4"></textarea>

        <label class="flex items-center gap-2">
        <input type="checkbox" name="is_reverse" value="1">
        Item Positif (Reverse Score)
        </label>

        <button class="bg-teal-600 text-white px-4 py-2 rounded">
        Simpan
        </button>
    </form>

</div>
<?php require '../../includes/layout/footer.php'; ?>