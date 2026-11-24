<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Memulai Pengecekan...<br>";

// 1. Cek Autoload Composer
if (file_exists(__DIR__.'/vendor/autoload.php')) {
    echo "1. File autoload.php DITEMUKAN.<br>";
    try {
        require __DIR__.'/vendor/autoload.php';
        echo "2. Autoload BERHASIL dimuat.<br>";
    } catch (\Throwable $e) {
        echo "<b style='color:red;'>ERROR di Autoload:</b> " . $e->getMessage() . "<br>";
        die();
    }
} else {
    echo "<b style='color:red;'>ERROR: File vendor/autoload.php TIDAK ADA.</b><br>";
    die();
}

// 2. Cek Bootstrap Laravel
try {
    $app = require_once __DIR__.'/bootstrap/app.php';
    echo "3. Bootstrap Laravel BERHASIL.<br>";
} catch (\Throwable $e) {
    echo "<b style='color:red;'>ERROR di Bootstrap:</b> " . $e->getMessage() . "<br>";
    echo "File: " . $e->getFile() . " (Baris: " . $e->getLine() . ")<br>";
    die();
}

// 3. Cek Kernel Console
try {
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    echo "4. Kernel Console BERHASIL dibuat.<br>";
} catch (\Throwable $e) {
    echo "<b style='color:red;'>ERROR di Kernel:</b> " . $e->getMessage() . "<br>";
    die();
}

echo "<h3 style='color:green;'>SELESAI: Laravel sepertinya siap jalan!</h3>";