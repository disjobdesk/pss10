<?php
function formatTanggal($date) {
    return date('d M Y H:i', strtotime($date));
}

function badgeStress($level) {
    return match($level) {
        'Stres Rendah' => 'bg-green-100 text-green-700',
        'Stres Sedang' => 'bg-yellow-100 text-yellow-700',
        'Stres Tinggi' => 'bg-orange-100 text-orange-700',
        'Stres Sangat Tinggi' => 'bg-red-100 text-red-700',
        default => 'bg-gray-100 text-gray-700',
    };
}

// Cocok untuk dashboard & hasil PSS-10

// CARA MEMANGGIL HELPER
// config/helpers.php
// Lalu panggil cukup:
// require '../config/helpers.php';