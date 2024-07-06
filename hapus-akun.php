<?php 
session_start();

include 'config/app.php';

if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
          </script>";
    exit;
}

// menerima id
$id_akun = (int)$_GET['id_akun'];
if (delete_akun($id_akun) > 0) {
    echo "<script>
            alert('Data Akun Berhasil dihapus');
            document.location.href = 'crud-modal.php';
         </script>";
} else {
    echo "<script>
            alert('Data Akun Gagal dihapus');
            document.location.href = 'crud-modal.php';
         </script>";
}