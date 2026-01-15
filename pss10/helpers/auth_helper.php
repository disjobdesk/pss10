<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

function isLogin() {
    return isset($_SESSION['user']);
}

function requireLogin() {
    if (!isLogin()) {
        header('Location: ../auth/login.php');
        exit;
    }
}

function requireRole(array $roles) {
    if (!isLogin() || !in_array($_SESSION['user']['role'], $roles)) {
        header('Location: ../auth/login.php');
        exit;
    }
}


//📌 Digunakan di:

// dashboard

// admin/*

// pss10/*