<?php 
session_start();

if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
          </script>";
    exit;
}
$title = 'Detail Mahasiswa';
include 'layout/header.php';

// get id
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>

<section class="container mt-4">
    <h1>Data <?= $mahasiswa['nama']; ?></h1>
    <hr>
    <table class="table table-bordered table-light table-striped">
        <tr>
            <td>Nama</td>
            <td>: <?= $mahasiswa['nama']; ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>: <?= $mahasiswa['prodi']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $mahasiswa['jk']; ?></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>: <?= $mahasiswa['telepon']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?= $mahasiswa['email']; ?></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><a href="assets/img/<?= $mahasiswa['foto']; ?>"><img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="30%"></a></td>
        </tr>
    </table>
    <a href="mahasiswa.php" class="btn btn-secondary btn-sm" style="float:right;"><i class="fas fa-caret-left"></i> Kembali</a>
</section>

<?php include 'layout/footer.php'; ?>
