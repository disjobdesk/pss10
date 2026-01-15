<?php
function redirectByRole($role) {
    switch ($role) {
        case 'superadmin':
            header('Location: ../admin/dashboard.php');
            break;
        case 'admin':
            header('Location: ../admin/dashboard_admin.php');
            break;
        default:
            header('Location: ../admin/dashboard_user.php');
    }
    exit;
}

// Dipakai di auth/login.php