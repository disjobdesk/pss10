<?php

function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_check() {
    if (!isset($_POST['csrf_token'])) {
        die('CSRF token tidak terkirim');
    }

    if (!isset($_SESSION['csrf_token'])) {
        die('CSRF token session hilang');
    }

    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('CSRF token tidak valid');
    }
}


// 📌 Dipakai di semua form POST