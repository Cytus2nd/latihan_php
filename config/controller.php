<?php 
    
    // function read data barang
    function select($query) {
        // koneksi database global
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    // function add data barang
    function create_barang($post) {
        global $db;
        $nama = $post["nama"];
        $jumlah = $post["jumlah"];
        $harga = $post["harga"];

        $query = "INSERT INTO `barang`(`nama`, `jumlah`, `harga`) VALUES ('$nama','$jumlah','$harga')";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    // update barang
    function update_barang($post) {
        global $db;
        $id_barang = $post["id_barang"];
        $nama = $post["nama"];
        $jumlah = $post["jumlah"];
        $harga = $post["harga"];

        $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = '$id_barang'";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    // delete
    function delete_barang($id_barang) {
        global $db;
        $query = "DELETE FROM barang WHERE id_barang = $id_barang";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }