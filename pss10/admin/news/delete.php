<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

requireRole(['superadmin','admin']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $id = $_POST['id_news'];

    $stmt = $pdo->prepare("DELETE FROM news WHERE id_news = ?");
    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
}
