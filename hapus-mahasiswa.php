<?php 
include 'config/app.php';

// menerima id
$id_mahasiswa = (int)$_GET['id_mahasiswa'];
if (delete_mahasiswa($id_mahasiswa) > 0) {
    echo "<script>
            alert('Data Mahasiswa Berhasil dihapus');
            document.location.href = 'mahasiswa.php';
         </script>";
} else {
    echo "<script>
            alert('Data Mahasiswa Gagal dihapus');
            document.location.href = 'mahasiswa.php';
         </script>";
}