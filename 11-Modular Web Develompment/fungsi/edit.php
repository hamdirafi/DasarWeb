<?php 
session_start();
if (isset($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';
    if (empty($_GET['jabatan'])) {
        $id = antiinjection($koneksi, $_POST['id']);
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);
        $query = "UPDATE jabatan SET jabatan='$jabatan', keterangan='$keterangan' WHERE id='$id'";
        if (pg_query($koneksi, $query)) {
            pesan('success', "Jabatan Telah Diubah.");
        } else {
            pesan('danger', "Mengubah Jabatan Karena: " . pg_last_error($koneksi));
        }
        header("Location: ../index.php?page=jabatan");
    }
}