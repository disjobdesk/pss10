<?php
require '../config/database.php';
require '../config/auth.php';
require '../config/security.php';
require '../config/helpers.php';



requireLogin();
csrf_check();

$id_user = $_SESSION['user']['id_user'];
$jawaban = $_POST['jawaban'] ?? [];

if (count($jawaban) != 10) {
    die('Jawaban tidak lengkap');
}

/* 1.  Ambil item & status reverse */
$stmt = $pdo->query(
    "SELECT id_item, is_reverse FROM pss_items"
);

/* 2.   Balik item positif (4,5,7,8) */
$items = [];
while ($row = $stmt->fetch()) {
    $items[$row['id_item']] = $row['is_reverse'];
}

$total = 0;
$detail = [];

/*3. Hitung skor */
foreach ($jawaban as $id_item => $skor) {
    $skor = (int)$skor;

    if ($items[$id_item] == 1) {
        $skor = 4 - $skor; // reverse scoring
    }

    $total += $skor;
    $detail[$id_item] = $skor;
}

/* 4. Cari interpretasi */
$stmt = $pdo->prepare(
    "SELECT level_stress
     FROM pss_interpretasi
     WHERE ? BETWEEN skor_total_min AND skor_total_max"
);
$stmt->execute([$total]);
$interpretasi = $stmt->fetch();

$level = $interpretasi['level_stress'] ?? 'Tidak Diketahui';

/* 5. Simpan HEADER */
$stmt = $pdo->prepare(
    "INSERT INTO pss_responses (id_user, skor_total, level_stress)
     VALUES (?, ?, ?)"
);
$stmt->execute([$id_user, $total, $level]);
$id_response = $pdo->lastInsertId();

/* 6. Simpan DETAIL 6.  Redirect ke result.php */
$stmtDetail = $pdo->prepare(
    "INSERT INTO pss_response_detail
     (id_response, id_item, skor)
     VALUES (?, ?, ?)"
);

foreach ($detail as $id_item => $skor) {
    $stmtDetail->execute([$id_response, $id_item, $skor]);
}

header("Location: result.php?id=$id_response");
exit;
