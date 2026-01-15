<?php
require '../config/database.php';
require '../config/security.php';
require '../config/helpers.php';
require '../config/auth.php';


$data = $pdo->query(
    "SELECT * FROM news ORDER BY created_at DESC"
)->fetchAll();

$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? null;

$dashboardUrl = 'index.php'; // default publik

if ($role === 'superadmin') {
    $dashboardUrl = '/pss10/admin/dashboard.php';
} elseif ($role === 'admin') {
    $dashboardUrl = '/pss10/admin/dashboard_admin.php';
} elseif ($role === 'user') {
    $dashboardUrl = '/pss10/admin/dashboard_user.php';
}


?>


<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- <h1 class="text-2xl font-bold text-teal-700 mb-4">
Berita & Edukasi Psikologi
</h1>

<div class="grid md:grid-cols-2 gap-4">
<?php foreach ($data as $n): ?>
<a href="detail.php?slug=<?= $n['slug'] ?>"
 class="block border p-4 rounded hover:bg-teal-50">
<h3 class="font-bold"><?= e($n['judul']) ?></h3>
<p class="text-sm text-gray-500">
<?= date('d M Y', strtotime($n['created_at'])) ?>
</p>
</a>
<?php endforeach; ?>
</div> -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berita & Edukasi Psikologi | WARAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body class="bg-gradient-to-b from-teal-50 to-white text-gray-700">

<!-- ================= HEADER ================= -->
<header class="bg-teal-700 p-1 shadow-md border-b border-teal-100 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

        <!-- Brand -->
        <div class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-full bg-teal-500 flex items-center justify-center
                        text-white font-bold tracking-wide">
                P
            </div>
            <span class="text-xl font-bold text-white">
                PSS-10
            </span>
        </div>

    </div>
</header>
<!-- ================= END HEADER ================= -->


<!-- ================= BODY ================= -->


<main class="min-h-screen py-10">
    <div class="max-w-6xl mx-auto px-4">

        <div class="mb-10">
        <a href="<?= $dashboardUrl ?>"
           class="inline-flex items-center gap-2
                  bg-teal-100 text-teal-800
                  px-4 py-2 rounded-xl text-lg font-semibold
                  hover:bg-teal-200 transition">
             Kembali ke Dashboard
        </a>
        </div>

    
        <!-- Title -->
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-teal-800">
                Berita & Edukasi Psikologi
            </h1>
            <p class="mt-2 max-w-2xl text-gray-600">
                Artikel terpercaya seputar kesehatan mental, psikologi,
                dan pengembangan diri berbasis kajian ilmiah.
            </p>
        </div>

        <!-- News List -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($data as $n): ?>
            <a href="detail.php?slug=<?= $n['slug'] ?>"
               class="group bg-white border border-gray-200 rounded-xl p-5
                      hover:border-teal-400 hover:shadow-lg transition duration-300">

                <span class="inline-block mb-2 text-xs font-semibold
                             text-teal-700 bg-teal-50 px-2 py-1 rounded">
                    Psikologi
                </span>

                <h3 class="font-bold text-lg text-gray-800 leading-snug
                           group-hover:text-teal-700 transition line-clamp-2">
                    <?= e($n['judul']) ?>
                </h3>

                <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                    <?= e(substr(strip_tags($n['slug']), 0, 120)) ?>...
                </p>

                <div class="mt-4 flex items-center justify-between text-xs text-gray-400">
                    <span>
                        <?= date('d M Y', strtotime($n['created_at'])) ?>
                    </span>
                    <span class="text-teal-600 font-medium group-hover:underline">
                        Baca →
                    </span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

    </div>
</main>
<!-- ================= END BODY ================= -->


<!-- ================= FOOTER ================= -->
<footer class="bg-teal-700 text-teal-50 mt-16">
    <div class="border-t border-teal-600 text-center text-xs text-teal-200 py-4">
        Portal edukasi psikologi untuk mendukung kesehatan mental masyarakat secara berkelanjutan
        <br>
        © <?= date('Y') ?> dikembangkan untuk edukasi & kesehatan mental berbasis data
    </div>
</footer>
<!-- ================= END FOOTER ================= -->

</body>
</html>


 