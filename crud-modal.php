<?php 
session_start();

if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
          </script>";
    exit;
}

    $title = 'Daftar Akun';
    include 'layout/header.php';

    // tampil seluruh data
    $data_akun = select("SELECT * FROM akun");

    // berdasarkan seesion login
    $id_akun = $_SESSION['id_akun'];
    $data_bylogin = select("SELECT * FROM akun WHERE id_akun = '$id_akun'");

    // script tambah
    if (isset($_POST["tambah"])) {
        if(create_akun($_POST) > 0) {
            echo "<script>
                    alert('Data Akun Berhasil ditambahkan');
                    document.location.href = 'crud-modal.php';
                </script>";
            } else {
                echo "<script>
                        alert('Data Akun Gagal ditambahkan');
                        document.location.href = 'crud-modal.php';
                    </script>";
        }
    }

    // script ubah
    if (isset($_POST["ubah"])) {
        if(update_akun($_POST) > 0) {
            echo "<script>
                    alert('Data Akun Berhasil diubah');
                    document.location.href = 'crud-modal.php';
                </script>";
            } else {
                echo "<script>
                        alert('Data Akun Gagal diubah');
                        document.location.href = 'crud-modal.php';
                    </script>";
        }
    }
?>

<section class="container mt-4">
    <h1>Data Akun</h1>
    <hr>

    <?php if($_SESSION['level']  == 1) : ?>
    <button class="mb-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
    <?php endif; ?>

    <table class="table table-bordered table-light table-striped" id="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>

            <!-- view all data  -->
            <?php if($_SESSION['level'] == 1) : ?>
            <?php foreach ($data_akun as $akun): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $akun['nama']; ?></td>
                <td><?= $akun['username']; ?></td>
                <td><?= $akun['email']; ?></td>
                <td>Password Hidden.</td>
                <td class="text-center">
                    <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">Ubah</button>
                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
                <!-- tampil berdasarkan user login -->
                <?php foreach ($data_bylogin as $akun): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $akun['nama']; ?></td>
                    <td><?= $akun['username']; ?></td>
                    <td><?= $akun['email']; ?></td>
                    <td>Password Hidden.</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">Ubah</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</section>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required minlength="8">
            </div>
            <div class="mb-3">
                <label for="level">User Level</label>
                <select name="level" id="level" class="form-control" required>
                    <option value="">---PILIH USER LEVEL---</option>
                    <option value="1">Admin</option>
                    <option value="2">Operator Barang</option>
                    <option value="3">Operator Mahasiswa</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal hapus -->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
            </div>
            <div class="modal-body">
                <p>Hapus Data Akun atas nama : <?= $akun['nama']; ?> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger">Hapus</a>
            </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Ubah -->
<?php foreach ($data_akun as $akun) : ?>
<div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Akun</h1>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required value="<?= $akun['nama']; ?>">
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required value="<?= $akun['username']; ?>">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required value="<?= $akun['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="password">Password <small>(Masukkan Password Baru atau Lama)</small></label>
                <input type="password" name="password" id="password" class="form-control" required minlength="8">
            </div>

            <?php if($_SESSION['level'] == 1) : ?>
            <div class="mb-3">
                <label for="level">User Level</label>
                <select name="level" id="level" class="form-control" required>
                    <?php $level = $akun['level']; ?>
                    <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                    <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator Barang</option>
                    <option value="3" <?= $level == '3' ? 'selected' : null ?>>Operator Mahasiswa</option>
                </select>
            </div>
            <?php else : ?>
                <input type="hidden" name="level" value="<?= $akun['level'] ?>">
            <?php endif; ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<?php 
    include 'layout/footer.php';
?>
