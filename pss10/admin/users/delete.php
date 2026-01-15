<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

requireRole(['superadmin']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM users WHERE id_user = ?");
    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
}
