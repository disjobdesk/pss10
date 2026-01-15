<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

requireRole(['superadmin','admin']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $id = $_POST['id_respon'];

    $stmt = $pdo->prepare(
        "DELETE FROM tipe_respon_stres WHERE id_respon = ?"
    );
    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
}
