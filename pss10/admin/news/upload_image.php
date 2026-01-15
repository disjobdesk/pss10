<?php
require '../../config/auth.php';

$uploadDir = '../../uploads/news/';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$file = $_FILES['upload'];
$filename = time() . '-' . $file['name'];
$path = $uploadDir . $filename;

move_uploaded_file($file['tmp_name'], $path);

echo json_encode([
    "url" => "/uploads/news/" . $filename
]);
