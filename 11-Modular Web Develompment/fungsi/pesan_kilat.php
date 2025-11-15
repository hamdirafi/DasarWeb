<?php
// Pastikan session hanya dimulai sekali
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Set flashdata
 */
function set_flashdata($key = "", $value = "")
{
    if (!empty($key) && !empty($value)) {
        $_SESSION['_flashdata'][$key] = $value;
        return true;
    }
    return false;
}

/**
 * Get flashdata
 * Mengambil lalu menghapus flashdata
 */
function get_flashdata($key = "")
{
    if (!empty($key) && !empty($_SESSION['_flashdata'][$key])) {
        $data = $_SESSION['_flashdata'][$key];
        unset($_SESSION['_flashdata'][$key]);
        return $data;
    }
    return null; // tidak ada popup alert bawaan
}

/**
 * Buat pesan kilat Bootstrap 5 otomatis
 */
function pesan($key = "", $pesan = "")
{
    $alert = "";

    if ($key === "info") {
        $alert = "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            <strong>Info!</strong> {$pesan}
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

    } elseif ($key === "success") {
        $alert = "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Berhasil!</strong> {$pesan}
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

    } elseif ($key === "danger") {
        $alert = "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Gagal!</strong> {$pesan}
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

    } elseif ($key === "warning") {
        $alert = "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Peringatan!</strong> {$pesan}
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }

    if ($alert !== "") {
        set_flashdata($key, $alert);
    }
}
