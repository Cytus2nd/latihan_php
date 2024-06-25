<?php 
    include 'layout/header.php';
    include 'form-poptambah.php';
    $data_barang = select("SELECT * FROM barang");
?>

<section class="container mt-4">
    <h1>Data Barang</h1>
    <hr>
    <button class="mb-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">Tambah Data</button>
    <table class="table table-bordered table-light table-striped">
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
                    <a href="" class="btn btn-success">Ubah</a>
                    <a href="" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>


<?php 
    include 'layout/footer.php';
?>
