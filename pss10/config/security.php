<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// /* CSRF TOKEN */
// function csrf_token() {
//     if (empty($_SESSION['csrf_token'])) {
//         $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
//     }
//     return '<input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">';
// }

// function csrf_check() {
//     if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//         die('CSRF invalid');
//     }
// }

// /* XSS FILTER */
// function e($string) {
//     return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
// }

// /* SECURITY HEADERS */
// header("X-Frame-Options: SAMEORIGIN");
// header("X-Content-Type-Options: nosniff");
// header("Referrer-Policy: no-referrer-when-downgrade");
