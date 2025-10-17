<?php
$pattern ='/[a-z]/'; // Cocokkan huruf kecil.
$text = 'This is aSample Text.';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "Tidak ada huruf kecil!";
}

$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'There are 123 apples.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';

$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text; // Output: "I like banana pie."

$pattern = '/go{2,4}d/'; // "o" muncul antara 2 sampai 4 kali
$text = 'god good goood goooood';
if (preg_match_all($pattern, $text, $matches)) {
    echo "Cocokkan: " . implode(", ", $matches[0]);
} else {
    echo "Tidak ada yang cocok!";
}


?>