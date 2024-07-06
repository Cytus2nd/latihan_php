<?php 

session_start();

// membatasi sebelum login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
          </script>";
    exit;
}

// membatasi halaman sesuai user login
if ($_SESSION['level'] != 1 OR $_SESSION['level'] != 2) {
    echo "<script>
            document.location.href = 'crud-modal.php'
          </script>";
    exit;
}

    $title = 'Daftar Barang';
    include 'layout/header.php';
    include 'form-poptambah.php';
    $data_barang = select("SELECT * FROM barang ORDER BY id_barang ASC");
?>

<section class="container mt-4">
    <h1><i class="fas fa-clipboard-list"></i> Data Barang</h1>
    <hr>
    <button class="mb-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal"><i class="fas fa-plus-circle"></i> Tambah Data</button>
    <table class="table table-bordered table-light table-striped" id="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Last Edited at</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_barang as $barang) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang['nama']; ?></td>
                <td><?= $barang['jumlah']; ?></td>
                <td>Rp. <?= number_format($barang['harga'],0,',','.'); ?></td>
                <td><?= date("d/m/Y | H:i:s", strtotime($barang['tanggal'])); ?></td>
                <td class="text-center">
                    <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin Menghapus ??');"><i class="fas fa-trash"></i> Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>


<?php 
    include 'layout/footer.php';
?>
