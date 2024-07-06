<?php 

// mengubah view web menjadi json
header("Content-Type: application/json");
require '../config/app.php';

// menerima input
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

if($nama== null) {
    echo json_encode(['pesan' => 'Nama tidak boleh kosong']);
    exit;
}
if($jumlah== null) {
    echo json_encode(['pesan' => 'Jumlah tidak boleh kosong']);
    exit;
}
if($harga== null) {
    echo json_encode(['pesan' => 'Harga tidak boleh kosong']);
    exit;
}

// query insert data
$query = "INSERT INTO barang VALUES (null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";
mysqli_query($db, $query);

// cek status data
if ($query) {
    echo json_encode(['pesan' => 'Data Barang Berhasil ditambahkan']);
} else {
    echo json_encode(['pesan' => 'Data Barang Gagal ditambahkan']);
}

