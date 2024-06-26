<?php 
    include 'layout/header.php';

    // memanggil id barang dari urls
    $id_barang = (int)$_GET['id_barang'];

    $barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

    if(isset($_POST['ubah'])){
        if(update_barang($_POST) > 0) {
            echo "<script>
                    alert('Data Barang Berhasil diubah');
                    document.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Barang Gagal diubah');
                    document.location.href = 'index.php';
                  </script>";
        }
    }
?>

    <div class="container mt-4">
        <h1>Ubah Data Barang</h1>
        <hr>
        <form action="" method="POST">
            <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" name="nama" value="<?= $barang['nama']; ?>" class="form-control" id="nama" placeholder="Nama Barang..." required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlah" value="<?= $barang['jumlah']; ?>" class="form-control" id="jumlah" placeholder="Jumlah Barang..." required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Barang</label>
                <input type="number" name="harga" value="<?= $barang['harga']; ?>" class="form-control" id="harga" placeholder="Harga Barang..." required>
            </div>
            <button type="submit" name="ubah" class="btn btn-primary mt-1" style="float: right;">Ubah Data</button>
        </form>
    </div>

<?php 
    include 'layout/footer.php';
?>
