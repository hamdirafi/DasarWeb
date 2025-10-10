<?php
$nama = @$_GET['nama'];  // @ digunakan agar tidak ada peringatan error ketika key-nya kosong
$usia = @$_GET['usia'];  // @ digunakan agar tidak ada peringatan error ketika key-nya kosong

echo "Halo {$nama}! Apakah benar anda berusia {$usia} tahun?";
?>