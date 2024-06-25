<?php 
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

    <!-- Modal -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Barang</h5>
            </div>
            <div class="modal-body">
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
                <button type="button" class="btn btn-danger mt-1" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


