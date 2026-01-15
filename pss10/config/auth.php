<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// function isLogin() {
//     return isset($_SESSION['user']);
// }

// function requireLogin() {
//     if (!isLogin()) {
//         header('Location: /auth/login.php');
//         exit;
//     }
// }

// function requireRole(array $roles) {
//     requireLogin();
//     if (!in_array($_SESSION['user']['role'], $roles)) {
//         die('Akses ditolak');
//     }
// }
