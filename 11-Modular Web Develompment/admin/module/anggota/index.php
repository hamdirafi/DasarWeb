<div class="container-fluid">
    <div class="row">
        <?php
        require 'admin/template/menu.php';

        // kunci: koneksi sudah di-load dari index.php
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Anggota</h1>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus"></i> Tambah Anggota
                    </button>
                </div>
            </div>

            <?php 
            if (isset($_SESSION['_flashdata'])) {
                echo "<br>";
                foreach ($_SESSION['_flashdata'] as $key => $val) {
                    echo get_flashdata($key);
                }
            }
            ?>

            <div class="table-responsive small">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        // PERBAIKAN JOIN
                        $query = "
                            SELECT a.*, j.jabatan, u.username 
                            FROM anggota a
                            JOIN jabatan j ON a.jabatan_id = j.id
                            JOIN users u ON a.user_id = u.id
                            ORDER BY a.anggota_id DESC
                        ";

                        $result = pg_query($koneksi, $query);

                        while ($row = pg_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['jabatan']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td>
                                   <a href="index.php?page=anggota&id=<?= $row['anggota_id']; ?>" 
   class="btn btn-warning btn-xs">
    <i class="fa fa-pencil-square-o"></i> Edit
</a>


                                    <a href="fungsi/hapus.php?anggota=hapus&id=<?= $row['anggota_id']; ?>" 
                                       onclick="return confirm('Hapus Data Anggota?');"
                                       class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash-o"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- MODAL TAMBAH -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Form Anggota</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form action="fungsi/tambah.php?anggota=tambah" method="POST">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="col-form-label">Nama:</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Jabatan:</label>
                                    <select class="form-select" name="jabatan">
                                        <option selected>Pilih Jabatan</option>
                                        <?php
                                        $query2 = "SELECT * FROM jabatan ORDER BY jabatan ASC";
                                        $result2 = pg_query($koneksi, $query2);
                                        while ($row2 = pg_fetch_assoc($result2)) {
                                        ?>
                                            <option value="<?= $row2['id']; ?>"><?= $row2['jabatan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Jenis Kelamin:</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" checked>
                                        <label class="form-check-label">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="P">
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Alamat:</label>
                                    <textarea class="form-control" name="alamat"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">No Telepon:</label>
                                    <input type="number" name="no_telp" class="form-control">
                                </div>

                                <hr>

                                <div class="mb-3">
                                    <label class="col-form-label">Username:</label>
                                    <input type="text" name="username" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Password:</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Level:</label>
                                    <select class="form-select" name="level">
                                        <option selected>Pilih Level</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="fa fa-times"></i> Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-floppy-o"></i> Simpan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
