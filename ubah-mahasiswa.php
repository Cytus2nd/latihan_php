<?php 
    session_start();

    if(!isset($_SESSION['login'])) {
        echo "<script>
                document.location.href = 'login.php'
              </script>";
        exit;
    }
    
    $title = 'Ubah Mahasiswa';
    include 'layout/header.php';

    if(isset($_POST['ubah'])){
        if(update_Mahasiswa($_POST) > 0) {
            echo "<script>
                    alert('Data Mahasiswa Berhasil diubah');
                    document.location.href = 'mahasiswa.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Mahasiswa Gagal diubah');
                    document.location.href = 'mahasiswa.php';
                  </script>";
        }
    }

    $id_mahasiswa = (int)$_GET['id_mahasiswa'];
    $mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>

    <div class="container mt-4">
        <h1>Ubah Data Mahasiswa</h1>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
            <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Mahasiswa..." required value="<?= $mahasiswa['nama']; ?>">
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select name="prodi" id="prodi" class="form-control" required>
                        <?php $prodi = $mahasiswa['prodi']; ?>
                        <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'selected' : null ?>>Teknik Informatika</option>
                        <option value="Sistem Informasi" <?= $prodi == 'Sistem Informasi' ? 'selected' : null ?>>Sistem Informasi</option>
                        <option value="Komputer Akuntansi" <?= $prodi == 'Komputer Akuntansi' ? 'selected' : null ?>>Komputer Akuntansi</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <?php $jk= $mahasiswa['jk']; ?>
                        <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
                        <option value="Perempuan" <?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="number" name="telepon" class="form-control" id="telepon" placeholder="No. Telepon..." required value="<?= $mahasiswa['telepon']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Mahasiswa</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email Mahasiswa..." required value="<?= $mahasiswa['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Mahasiswa</label>
                <input type="file" name="foto" class="form-control" id="foto" placeholder="Upload Foto Mahasiswa..." onchange="previewImg()">
                <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">
            </div>
             
            <button type="submit" name="ubah" class="btn btn-primary mt-1" style="float: right;">Ubah Data</button>
        </form>
    </div>

<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php 
    include 'layout/footer.php';
?>
