<?php
require '../config/database.php';
require '../config/security.php';
require '../config/helpers.php';
require '../config/auth.php';


$slug = $_GET['slug'];

$stmt = $pdo->prepare("SELECT * FROM news WHERE slug = ?");
$stmt->execute([$slug]);
$data = $stmt->fetch();

if (!$data) die('Berita tidak ditemukan');
?>

<!-- <h1 class="text-2xl font-bold text-teal-700 mb-2">
<?= e($data['judul']) ?>
</h1>

<p class="text-sm text-gray-500 mb-4">
<?= date('d M Y', strtotime($data['created_at'])) ?>
</p>

<div class="prose max-w-none">
<?= nl2br(e($data['isi'])) ?>
</div>
 -->

 <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= e($data['judul']) ?> | PSS-10</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-emerald-50 min-h-screen flex flex-col">

<!-- ================= HEADER ================= -->
<header class="sticky top-0 z-50 bg-teal-600 shadow">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <div class="text-white font-bold text-2xl tracking-wide">
      PSS-10
    </div>

    <a href="index.php"
       class="bg-white text-teal-700 px-4 py-2 rounded-xl
              font-semibold hover:bg-teal-100 transition">
      Berita
    </a>
  </div>
</header>

<br>

<!-- ================= BODY ================= -->
<main class="flex-grow">

  <article class="max-w-3xl mx-auto px-4 py-8 bg-white
                  rounded-2xl shadow-sm">

    <!-- TOMBOL KEMBALI -->
    <div class="mb-6">
      <a href="index.php"
         class="inline-flex items-center gap-2
                bg-teal-100 text-teal-800
                px-4 py-2 rounded-xl text-lg font-semibold
                hover:bg-teal-200 transition">
       Kembali ke Daftar Berita
      </a>
    </div>

    <!-- JUDUL -->
    <h1 class="text-3xl md:text-4xl font-bold text-teal-800 leading-snug mb-4">
      <?= e($data['judul']) ?>
    </h1>

    <!-- META -->
    <div class="text-gray-500 text-base mb-8">
      Dipublikasikan pada
      <span class="font-semibold">
        <?= date('d M Y', strtotime($data['created_at'])) ?>
      </span>
    </div>

    <!-- KONTEN BERITA -->
<!--     <div class="text-lg leading-relaxed text-gray-800 space-y-5">

      <?= nl2br(e($data['isi'])) ?>

    </div> -->

    <div class="prose prose-teal max-w-none">
      <?= $data['isi'] ?>
    </div>


  </article>

</main>

<!-- ================= FOOTER ================= -->
<footer class="bg-teal-700 text-white mt-12">
  <div class="max-w-7xl mx-auto px-4 py-6 text-center space-y-2">

    <p class="text-lg font-semibold">
     Perceived Stress Scale
    </p>

    <p class="text-sm text-teal-100">
      Portal edukasi kesehatan mental dan skrining stres berbasis web
    </p>

    <p class="text-sm text-teal-200">
      © <?= date('Y') ?> PSS-10
    </p>

  </div>
</footer>

</body>
</html>