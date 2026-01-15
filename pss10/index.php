<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>PSS-10 | Pengukuran Stres</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

<!-- ================= HEADER ================= -->
<header class="sticky top-0 z-50 bg-teal-600 shadow">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <div class="text-white font-bold text-2xl tracking-wide">
      PSS-10
    </div>

    <div class="flex gap-2">
      <?php if (!isset($_SESSION['user'])): ?>
        <a href="/pss10/auth/login.php"
           class="bg-white text-teal-700 px-4 py-2 rounded-xl font-semibold hover:bg-teal-100 transition">
          Login
        </a>
      <?php else: ?>
     
      <?php endif; ?>
    </div>
  </div>
</header>

<!-- ================= HERO ================= -->
<section class="bg-teal-700 text-white">
  <div class="max-w-7xl mx-auto px-4 py-20 text-center">

    <h1 class="text-4xl sm:text-5xl font-bold mb-6 leading-tight">
      Kenali Tingkat Stres Anda
    </h1>

    <p class="text-xl sm:text-2xl text-teal-100 mb-10 max-w-3xl mx-auto">
      PSS-10 adalah kuesioner psikologi untuk mengukur tingkat stres
      berdasarkan pengalaman Anda selama 1 bulan terakhir.
    </p>

    <div class="flex flex-col sm:flex-row justify-center gap-4">

      <a href="/pss10/auth/register.php"
         class="bg-white text-teal-700 text-lg px-8 py-4 rounded-2xl font-bold
                hover:bg-teal-100 transition">
        Daftar & Mulai Tes
      </a>

<!--       <a href="/pss10/auth/login.php"
         class="bg-teal-800 text-white text-lg px-8 py-4 rounded-2xl font-bold
                hover:bg-teal-900 transition">
        Login
      </a> -->

    </div>
  </div>
</section>

<!-- ================= INFORMASI ================= -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4">

    <h2 class="text-3xl font-bold text-teal-700 text-center mb-12">
      Tentang PSS-10
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

      <div class="bg-teal-50 p-6 rounded-2xl">
        <h3 class="text-xl font-semibold text-teal-700 mb-2">
          10 Pertanyaan
        </h3>
        <p class="text-gray-700">
          Mengukur persepsi stres secara sederhana dan cepat.
        </p>
      </div>

      <div class="bg-teal-50 p-6 rounded-2xl">
        <h3 class="text-xl font-semibold text-teal-700 mb-2">
          Skor Akurat
        </h3>
        <p class="text-gray-700">
          Skor 0–40 dengan interpretasi tingkat stres.
        </p>
      </div>

      <div class="bg-teal-50 p-6 rounded-2xl">
        <h3 class="text-xl font-semibold text-teal-700 mb-2">
          Rekomendasi
        </h3>
        <p class="text-gray-700">
          Dilengkapi saran sesuai hasil stres Anda.
        </p>
      </div>

      <div class="bg-teal-50 p-6 rounded-2xl">
        <h3 class="text-xl font-semibold text-teal-700 mb-2">
          Aman & Privat
        </h3>
        <p class="text-gray-700">
          Data dijaga dan hanya untuk kebutuhan evaluasi.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ================= CTA ================= -->
<section class="bg-teal-600 text-white py-16 text-center">
  <h2 class="text-3xl font-bold mb-6">
    Siap Mengukur Tingkat Stres Anda?
  </h2>
<!--   <a href="/pss10/auth/register.php"
     class="bg-white text-teal-700 px-8 py-4 rounded-2xl text-lg font-bold
            hover:bg-teal-100 transition">
    Daftar Sekarang
  </a> -->
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-teal-800 text-teal-100 py-6 text-center text-sm">
  © <?= date('Y') ?> PSS-10 
</footer>

</body>
</html>
