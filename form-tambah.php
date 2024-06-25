<?php 
    include 'layout/header.php';

    if(isset($_POST['tambah'])){
        if(create_barang($_POST) > 0) {
            echo "<script>
                    alert('Data Barang Berhasil ditambahkan');
                    document.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Barang Gagal ditambahkan');
                    document.location.href = 'index.php';
                  </script>";
        }
    }
?>

    <div class="container mt-4">
        <h1>Tambah Data</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Barang..." required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Barang..." required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Barang</label>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Barang..." required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary mt-1" style="float: right;">Tambah Data</button>
        </form>
    </div>

<?php 
    include 'layout/footer.php';
?>
