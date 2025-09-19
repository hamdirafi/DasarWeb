<?php
// kontrol1.php

// Daftar nilai 10 siswa
$nilai = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

// Urutkan nilai dari yang terkecil ke terbesar
sort($nilai);

// Hapus 2 nilai terendah
array_shift($nilai); // hapus 64
array_shift($nilai); // hapus 70

// Hapus 2 nilai tertinggi
array_pop($nilai);   // hapus 96
array_pop($nilai);   // hapus 92

// Hitung total nilai setelah penghapusan
$total = array_sum($nilai);

// Tampilkan hasil
echo "Nilai yang digunakan: " . implode(", ", $nilai) . "<br>";
echo "Total nilai setelah mengabaikan 2 tertinggi dan 2 terendah: $total<br>";
?>
