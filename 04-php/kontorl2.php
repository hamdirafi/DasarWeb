<?php
// kontrol2.php

$harga = 120000;
$diskon = 0;

if ($harga > 100000) {
    $diskon = 0.20; // 20%
}

$hargaDiskon = $harga - ($harga * $diskon);

// Tampilkan hasil
echo "Harga awal: Rp " . number_format($harga, 0, ',', '.') . "<br>";
echo "Diskon: " . ($diskon * 100) . "%<br>";
echo "Harga yang harus dibayar: Rp " . number_format($hargaDiskon, 0, ',', '.') . "<br>";
?>
