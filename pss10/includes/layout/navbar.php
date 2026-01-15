<!-- <header class="sticky top-0 z-50 bg-teal-600 shadow">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

    <div class="text-white font-bold text-xl">
      PSS-10
    </div>

    <div class="flex gap-2">
      <a href="/pss10/admin/dashboard.php"
         class="hidden sm:block bg-white text-teal-700 px-4 py-2 rounded-xl font-semibold">
        Dashboard
      </a>

      <a href="/pss10/auth/logout.php"
         class="bg-teal-800 text-white px-4 py-2 rounded-xl font-semibold">
        Logout
      </a>
    </div>

  </div>
</header>
 -->

<?php
$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? '';

$dashboardUrl = '/pss10/admin/dashboard_user.php';
if ($role === 'superadmin') {
    $dashboardUrl = '/pss10/admin/dashboard.php';
} elseif ($role === 'admin') {
    $dashboardUrl = '/pss10/admin/dashboard_admin.php';
}
?>

<header class="sticky top-0 z-50 bg-teal-600 shadow">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

    <div class="text-white font-bold text-2xl tracking-wide">
      PSS-10
    </div>

    <div class="flex items-center gap-3">

      <!-- DASHBOARD DINAMIS -->
      <a href="<?= $dashboardUrl ?>"
         class="hidden sm:inline-block bg-white text-teal-700 px-4 py-2
                rounded-xl font-semibold hover:bg-teal-100 transition">
        Dashboard
      </a>

      <?php if ($role === 'superadmin'): ?>
        <a href="/pss10/admin/users/index.php"
           class="hidden sm:inline-block bg-white text-teal-700 px-4 py-2
                  rounded-xl font-semibold hover:bg-teal-100 transition">
          Users
        </a>
      <?php endif; ?>

      <?php if (in_array($role, ['superadmin','admin'])): ?>
        <a href="/pss10/admin/items/index.php"
           class="hidden sm:inline-block bg-white text-teal-700 px-4 py-2
                  rounded-xl font-semibold hover:bg-teal-100 transition">
          Item PSS
        </a>
      <?php endif; ?>

      <!-- USER INFO -->
      <div class="hidden sm:flex items-center gap-2 bg-teal-700 text-white px-4 py-2 rounded-xl">
        <div class="w-8 h-8 rounded-full bg-teal-200 text-teal-800
                    flex items-center justify-center font-bold">
          <?= strtoupper(substr($user['nama'],0,1)) ?>
        </div>

        <div class="text-sm leading-tight">
          <div class="font-semibold"><?= htmlspecialchars($user['nama']) ?></div>
          <div class="text-xs text-teal-200"><?= ucfirst($role) ?></div>
        </div>
      </div>

      <a href="/pss10/auth/logout.php"
         class="bg-red-500 text-white px-4 py-2 rounded-xl
                font-semibold hover:bg-teal-900 transition">
        Logout
      </a>

    </div>
  </div>
</header>
