<?php
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// 📌 Digunakan setiap output:
// <?= e($data['judul']) ?>