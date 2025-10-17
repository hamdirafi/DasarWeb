<?php
// Folder penyimpanan file gambar
$targetDirectory = "uploads/";

// Periksa apakah direktori sudah ada, kalau belum maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Cek apakah ada file yang diunggah
if (isset($_FILES['files']['name'][0])) {
    $totalFiles = count($_FILES['files']['name']);

    // Loop setiap file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $targetFile = $targetDirectory . basename($fileName);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Hanya izinkan file gambar
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowedExtensions)) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "File <strong>$fileName</strong> berhasil diunggah.<br>";
                // Tampilkan thumbnail gambar
                echo "<img src='$targetFile' width='200' style='height:auto; margin:10px; border:1px solid #ccc;'><br>";
            } else {
                echo "Gagal mengunggah file <strong>$fileName</strong>.<br>";
            }
        } else {
            echo "File <strong>$fileName</strong> bukan gambar yang valid.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
