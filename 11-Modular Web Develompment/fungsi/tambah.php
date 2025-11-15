<?php
session_start();

if (!empty($_SESSION['username'])) {

    // FIX path (tanpa spasi)
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';

    /* ===============================
       ========== TAMBAH JABATAN ======
       =============================== */
    if (!empty($_GET['jabatan'])) {

        // Anti injection PostgreSQL
        $jabatan     = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan  = antiinjection($koneksi, $_POST['keterangan']);

        // Query PostgreSQL
        $query = "INSERT INTO jabatan (jabatan, keterangan) 
                  VALUES ('$jabatan', '$keterangan')";

        if (pg_query($koneksi, $query)) {
            pesan('success', "Jabatan Baru Ditambahkan.");
        } else {
            pesan('danger', "Gagal Menambahkan Jabatan Karena: " . pg_last_error($koneksi));
        }

        header("Location: ../index.php?page=jabatan");
        exit;
    }


    /* ===============================
       ========== TAMBAH ANGGOTA ======
       =============================== */
    if (!empty($_GET['anggota'])) {

        // FIX: gunakan antiinjection (fungsi aslinya)
        $username      = antiinjection($koneksi, $_POST['username']);
        $password      = antiinjection($koneksi, $_POST['password']);
        $level         = antiinjection($koneksi, $_POST['level']);
        $jabatan_id    = antiinjection($koneksi, $_POST['jabatan']);
        $nama          = antiinjection($koneksi, $_POST['nama']);
        $jenis_kelamin = antiinjection($koneksi, $_POST['jenis_kelamin']);
        $alamat        = antiinjection($koneksi, $_POST['alamat']);
        $no_telp       = antiinjection($koneksi, $_POST['no_telp']);

        // Generate password
        $salt = bin2hex(random_bytes(16));
        $combined = $salt . $password;
        $hashed_password = password_hash($combined, PASSWORD_BCRYPT);

        // INSERT INTO users (bukan user)
        $query_user = "
            INSERT INTO users (username, password, salt, level)
            VALUES ('$username', '$hashed_password', '$salt', '$level')
            RETURNING id
        ";

        // Jalankan dan ambil id pengguna
        $result_user = pg_query($koneksi, $query_user);
        if ($result_user) {
            $row_user = pg_fetch_assoc($result_user);
            $user_id = $row_user['id'];

            // Insert anggota
            $query_anggota = "
                INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp, user_id, jabatan_id)
                VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp', '$user_id', '$jabatan_id')
            ";

            if (pg_query($koneksi, $query_anggota)) {
                pesan('success', "Anggota Baru Ditambahkan.");
            } else {
                pesan('warning', "User tersimpan, tetapi anggota gagal: " . pg_last_error($koneksi));
            }

        } else {
            pesan('danger', "Gagal Menambahkan User Karena: " . pg_last_error($koneksi));
        }

        header("Location: ../index.php?page=anggota");
        exit;
    }
}
?>