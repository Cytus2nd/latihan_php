<?php 
session_start();

if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
          </script>";
    exit;
}

// membatasi halaman sesuai user login
if ($_SESSION['level'] != 1 AND $_SESSION['level'] != 3) {
    echo "<script>
            document.location.href = 'crud-modal.php'
          </script>";
    exit;
}

$title = 'Daftar Mahasiswa';
include 'layout/header.php';
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC")
?>

<section class="container mt-4">
    <h1><i class="fas fa-users"></i> Data Mahasiswa</h1>
    <hr>
    <a href="tambah-mahasiswa.php" class="mb-3 btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
    <table class="table table-bordered table-light table-striped" id="tabel-mhs">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $mahasiswa['nama']; ?></td>
                <td><?= $mahasiswa['prodi']; ?></td>
                <td><?= $mahasiswa['jk']; ?></td>
                <td><?= $mahasiswa['telepon']; ?></td>
                <td width="20%" class="text-center">
                    <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-info-circle"></i> Detail</a>
                    <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>"  class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>"  class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin ingin Menghapus ??');"><i class="fas fa-trash"></i> Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include 'layout/footer.php'; ?>
