<?php
// latihanoperator.php

$a = 10;
$b = 5;

// =========================
// Operator Increment & Decrement
// =========================
$awal = $a;

// Pre-increment
$preIncrement = ++$a;  // nilai $a bertambah dulu, baru disimpan

// Reset nilai a
$a = $awal;

// Post-increment
$postIncrement = $a++; // nilai $a dipakai dulu, baru bertambah

// Reset nilai a
$a = $awal;

// Pre-decrement
$preDecrement = --$a;  // nilai $a berkurang dulu, baru disimpan

// Reset nilai a
$a = $awal;

// Post-decrement
$postDecrement = $a--; // nilai $a dipakai dulu, baru berkurang

// =========================
// Tampilkan hasil dengan HTML
// =========================
echo "<h2>🔹 Hasil Operasi Increment & Decrement</h2>";
echo "Nilai awal a = $awal <br>";
echo "Pre-Increment (++a) = $preIncrement <br>";
echo "Post-Increment (a++) = $postIncrement, setelah increment a = $a <br>";

// Reset untuk decrement output yang benar
$a = $awal;
echo "Pre-Decrement (--a) = $preDecrement <br>";
echo "Post-Decrement (a--) = $postDecrement, setelah decrement a = $a <br>";
?>
