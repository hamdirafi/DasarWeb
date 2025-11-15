<?php
$koneksi = pg_connect("host=localhost port=5432 dbname=js11 user=postgres password=12345678");

if (!$koneksi) {
    die("Koneksi ke PostgreSQL gagal: " . pg_last_error());
}
?>