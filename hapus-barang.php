<?php 
include 'config/app.php';

// menerima id
$id_barang = (int)$_GET['id_barang'];
if (delete_barang($id_barang) > 0) {
    echo "<script>
            alert('Data Barang Berhasil dihapus');
            document.location.href = 'index.php';
         </script>";
} else {
    echo "<script>
            alert('Data Barang Gagal dihapus');
            document.location.href = 'index.php';
         </script>";
}