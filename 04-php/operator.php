<?php
$a = 10;
$b = 5;

// =============================
// Operator Aritmatika
// =============================
$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali   = $a * $b;
$hasilBagi   = $a / $b;
$sisaBagi    = $a % $b;
$pangkat     = $a ** $b;

// =============================
// Operator Perbandingan
// =============================
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

// Inisialisasi hasilIdentik dan hasilTidakIdentik
$hasilIdentik = ($a === $b); // Identik (===) comparison
$hasilTidakIdentik = ($a !== $b); // Tidak Identik (!==) comparison

// =============================
// Operator Logika
// =============================
$logikaAND = ($a > 0 && $b > 0);
$logikaOR  = ($a > 0 || $b < 0);
$logikaNOT = !($a == $b);

// =============================
// Operasi Assignment
// =============================
// Supaya terlihat jelas, reset ulang nilai $a
$a = 10;
$b = 5;

$assignTambah = $a; 
$assignTambah += $b; 

$assignKurang = $a; 
$assignKurang -= $b; 

$assignKali = $a; 
$assignKali *= $b; 

$assignBagi = $a; 
$assignBagi /= $b; 

$assignSisa = $a; 
$assignSisa %= $b;

// =============================
// Tampilkan hasil dengan format HTML
// =============================
echo "<h2>🔢 Hasil Operasi Aritmatika</h2>";
echo "Hasil Tambah: $hasilTambah <br>";
echo "Hasil Kurang: $hasilKurang <br>";
echo "Hasil Kali: $hasilKali <br>";
echo "Hasil Bagi: $hasilBagi <br>";
echo "Sisa Bagi: $sisaBagi <br>";
echo "Pangkat: $pangkat <br>";

echo "<h2>⚖️ Hasil Operasi Perbandingan</h2>";
echo "Apakah Sama: " . ($hasilSama ? 'True' : 'False') . "<br>";
echo "Apakah Tidak Sama: " . ($hasilTidakSama ? 'True' : 'False') . "<br>";
echo "Apakah Lebih Kecil: " . ($hasilLebihKecil ? 'True' : 'False') . "<br>";
echo "Apakah Lebih Besar: " . ($hasilLebihBesar ? 'True' : 'False') . "<br>";
echo "Apakah Lebih Kecil atau Sama: " . ($hasilLebihKecilSama ? 'True' : 'False') . "<br>";
echo "Apakah Lebih Besar atau Sama: " . ($hasilLebihBesarSama ? 'True' : 'False') . "<br>";
echo "Apakah Identik (===): " . ($hasilIdentik ? 'True' : 'False') . "<br>";
echo "Apakah Tidak Identik (!==): " . ($hasilTidakIdentik ? 'True' : 'False') . "<br>";

echo "<h2>🔑 Hasil Operasi Logika</h2>";
echo "Logika AND (a > 0 && b > 0): " . ($logikaAND ? 'True' : 'False') . "<br>";
echo "Logika OR (a > 0 || b < 0): " . ($logikaOR ? 'True' : 'False') . "<br>";
echo "Logika NOT (!(a == b)): " . ($logikaNOT ? 'True' : 'False') . "<br>";

echo "<h2>📝 Hasil Operasi Assignment</h2>";
echo "\$a += \$b : $assignTambah <br>";
echo "\$a -= \$b : $assignKurang <br>";
echo "\$a *= \$b : $assignKali <br>";
echo "\$a /= \$b : $assignBagi <br>";
echo "\$a %= \$b : $assignSisa <br>";
?>