<?php
session_start();
if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';
    if (!empty($_GET['id'])) {
        $id = antiinjection($koneksi, $_GET['id']);
        $query = "DELETE FROM jabatan WHERE id='$id'";
        if (pg_query($koneksi, $query)) {
            pesan('success', "Jabatan Berhasil Dihapus.");
        } else {
            pesan('danger', "Menghapus Jabatan Gagal Karena: " . mysqli_error($koneksi));
        }
        header("Location: ../index.php?page=jabatan");
    }
}