<?php
require '../config/database.php';
require '../config/auth.php';
require '../config/security.php';
require '../config/helpers.php';

require '../includes/layout/header.php';



requireLogin();

$items = $pdo->query(
    "SELECT * FROM pss_items ORDER BY nomor_item ASC"
)->fetchAll();
?>


<header class="sticky top-0 z-50 bg-teal-600 shadow">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

    <div class="text-white font-bold text-2xl tracking-wide">
      PSS-10
    </div>
    <div class="flex items-center gap-3">
    </div>
  </div>
</header>
<!-- <script src="https://cdn.tailwindcss.com"></script> -->

<!-- <h1 class="text-2xl font-bold text-teal-700 mb-4">
Kuesioner PSS-10
</h1>

<form method="POST" action="submit.php" class="space-y-6">
<input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

<?php foreach ($items as $item): ?>
<div class="border rounded p-4">
  <p class="font-semibold mb-2">
    <?= $item['nomor_item'] ?>. <?= e($item['pernyataan']) ?>
  </p>

  <div class="grid grid-cols-1 md:grid-cols-5 gap-2 text-sm">
    <?php for ($i=0; $i<=4; $i++): ?>
    <label class="flex items-center gap-1">
      <input type="radio"
             name="jawaban[<?= $item['id_item'] ?>]"
             value="<?= $i ?>"
             required>
      <?= $i ?>
    </label>
    <?php endfor; ?>
  </div>
</div>
<?php endforeach; ?>

<button class="bg-teal-600 text-white px-6 py-2 rounded">
Kirim Jawaban
</button>
</form> -->

<div class="max-w-4xl mx-auto px-4 py-10 bg-emerald-50 rounded-2xl">

  <!-- Header -->
  <div class="mb-10 text-center">
    <h1 class="text-3xl font-bold text-teal-700 mb-2">
      Kuesioner PSS-10
    </h1>
    <p class="text-emerald-700 text-sm max-w-2xl mx-auto">
      Silakan pilih jawaban yang paling menggambarkan perasaan Anda
      selama <span class="font-semibold text-teal-700">1 bulan terakhir</span>.
    </p>
  </div>

  <form method="POST" action="submit.php" class="space-y-7">
    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

    <?php foreach ($items as $item): ?>
    <div class="bg-white border border-emerald-200 rounded-2xl shadow-sm p-6">

      <!-- Pertanyaan -->
      <p class="font-semibold text-teal-800 mb-4 leading-relaxed">
        <?= $item['nomor_item'] ?>.
        <?= e($item['pernyataan']) ?>
      </p>

      <!-- Skala Jawaban -->
      <div class="grid grid-cols-1 sm:grid-cols-5 gap-3 text-sm">

        <?php
          $labels = [
            'Tidak Pernah',
            'Hampir Tidak Pernah',
            'Kadang-kadang',
            'Cukup Sering',
            'Sangat Sering'
          ];
        ?>

        <?php for ($i = 0; $i <= 4; $i++): ?>
        <label
          class="cursor-pointer border border-emerald-200 rounded-xl p-3 text-center
                 transition-all duration-200
                 hover:bg-emerald-100 hover:border-emerald-400
                 has-[:checked]:bg-teal-600
                 has-[:checked]:text-white
                 has-[:checked]:border-teal-600">

          <input type="radio"
                 name="jawaban[<?= $item['id_item'] ?>]"
                 value="<?= $i ?>"
                 required
                 class="hidden">

          <div class="font-semibold"><?= $i ?></div>
          <div class="text-xs mt-1 opacity-90">
            <?= $labels[$i] ?>
          </div>
        </label>
        <?php endfor; ?>

      </div>
    </div>
    <?php endforeach; ?>

    <!-- Tombol Submit -->
    <div class="text-center pt-8">
      <button
        type="submit"
        class="bg-teal-600 hover:bg-teal-700 text-white
               px-10 py-3 rounded-2xl font-semibold
               shadow-md transition">
        Kirim Jawaban
      </button>
    </div>

  </form>
</div>

<?php require '../includes/layout/footer.php'; ?>