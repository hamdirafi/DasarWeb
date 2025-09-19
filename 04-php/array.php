<?php
// ===============================
// Bagian 1: Seleksi Nilai Siswa
// ===============================
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 70) {
        $nilaiLulus[] = $nilai;
    }
}

echo "<h3>Daftar nilai siswa yang lulus (≥ 70):</h3>";
echo implode(', ', $nilaiLulus);
echo "<hr>";

// ===============================
// Bagian 2: Seleksi Karyawan
// ===============================
$daftarKaryawan = [
    ['Alice', 7],
    ['Bob', 3],
    ['Charlie', 9],
    ['David', 5],
    ['Eva', 6],
];

$karyawanPengalamanLimaTahun = [];

foreach ($daftarKaryawan as $karyawan) {
    if ($karyawan[1] > 5) {
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}

echo "<h3>Daftar karyawan dengan pengalaman kerja lebih dari 5 tahun:</h3>";
echo implode(', ', $karyawanPengalamanLimaTahun);

// ===============================
// Bagian 3: Array Multidimensi Nilai Mahasiswa
// ===============================
$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie', 85],
    ],
];

$mataKuliah = 'Fisika';

echo "<h3>Daftar nilai mahasiswa dalam mata kuliah $mataKuliah:</h3>";

foreach ($daftarNilai[$mataKuliah] as $nilai) {
    echo "Nama: {$nilai[0]}, Nilai: {$nilai[1]} <br>";
}

// ===============================
// Bagian 4: Nilai Matematika di atas rata-rata (Question No.25)
// ===============================
$nilaiMatematika = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

// Hitung rata-rata kelas
$total = 0;
foreach ($nilaiMatematika as $siswa) {
    $total += $siswa[1];
}
$rataRata = $total / count($nilaiMatematika);

// Tampilkan rata-rata
echo "<h3>Rata-rata kelas Matematika: $rataRata</h3>";

// Tampilkan siswa dengan nilai di atas rata-rata
echo "<h3>Daftar siswa dengan nilai di atas rata-rata:</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Nilai</th></tr>";

foreach ($nilaiMatematika as $siswa) {
    if ($siswa[1] > $rataRata) {
        echo "<tr><td>{$siswa[0]}</td><td>{$siswa[1]}</td></tr>";
    }
}
echo "</table>";
?>