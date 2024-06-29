<?php 
    $title = 'Tambah Mahasiswa';
    include 'layout/header.php';

    if(isset($_POST['tambah'])){
        if(create_Mahasiswa($_POST) > 0) {
            echo "<script>
                    alert('Data Mahasiswa Berhasil ditambahkan');
                    document.location.href = 'mahasiswa.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Mahasiswa Gagal ditambahkan');
                    document.location.href = 'mahasiswa.php';
                  </script>";
        }
    }
?>

    <div class="container mt-4">
        <h1>Tambah Data Mahasiswa</h1>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Mahasiswa..." required>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select name="prodi" id="prodi" class="form-control" required>
                        <option value="">--PIlih Prodi--</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Komputer Akuntansi">Komputer Akuntansi</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option value="">--PIlih Jenis Kelamin--</option>
                        <option value="Teknik Informatika">Laki-Laki</option>
                        <option value="Sistem Informasi">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="number" name="telepon" class="form-control" id="telepon" placeholder="No. Telepon..." required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Mahasiswa</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email Mahasiswa..." required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Mahasiswa</label>
                <input type="file" name="foto" class="form-control" id="foto" placeholder="Upload Foto Mahasiswa...">
            </div>
             
            <button type="submit" name="tambah" class="btn btn-primary mt-1" style="float: right;">Tambah Data</button>
        </form>
    </div>

<?php 
    include 'layout/footer.php';
?>
