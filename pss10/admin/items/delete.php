<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

requireRole(['superadmin','admin']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM pss_items WHERE id_item = ?");
    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
}
