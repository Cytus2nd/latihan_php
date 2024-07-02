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
        $nama = strip_tags($post["nama"]);
        $jumlah = strip_tags($post["jumlah"]);
        $harga = strip_tags($post["harga"]);

        $query = "INSERT INTO `barang`(`nama`, `jumlah`, `harga`) VALUES ('$nama','$jumlah','$harga')";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    // update barang
    function update_barang($post) {
        global $db;
        $id_barang = strip_tags($post["id_barang"]);
        $nama = strip_tags($post["nama"]);
        $jumlah = strip_tags($post["jumlah"]);
        $harga = strip_tags($post["harga"]);

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

    // create mahasiswa
    function create_mahasiswa($post) {
        global $db;
        $nama = strip_tags($post['nama']);
        $prodi = strip_tags($post['prodi']);
        $jk = strip_tags($post['jk']);
        $telepon = strip_tags($post['telepon']);
        $email = strip_tags($post['email']);
        $foto = upload_file();

        // cek upload
        if (!$foto) {
            return false;
        }

        $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$email', '$foto')";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function update_mahasiswa($post) {
        global $db;
        $id_mahasiswa = strip_tags($post['id_mahasiswa']);
        $nama = strip_tags($post['nama']);
        $prodi = strip_tags($post['prodi']);
        $jk = strip_tags($post['jk']);
        $telepon = strip_tags($post['telepon']);
        $email = strip_tags($post['email']);
        $fotoLama = strip_tags($post['fotoLama']);

        // cek upload foto baru atau tidak
        if ($_FILES['foto']['error'] == 4) {
            $foto = $fotoLama;
        } else {
            $foto = upload_file();
        }

        $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function upload_file() {
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('Yang anda upload bukan gambar');
                    document.location.href = 'tambah-mahasiswa.php';
                  </script>";
            die();
        }

        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 2048000) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar (MAX 2MB)');
                    document.location.href = 'tambah-mahasiswa.php';
                  </script>";
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    function delete_mahasiswa($id_mahasiswa) {
        global $db;

        // ambil gambar/foto
        $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
        unlink("assets/img/".$foto['foto']);

        $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function create_akun($post) {
        global $db;
        $nama = strip_tags($post['nama']);
        $username = strip_tags($post['username']);
        $email = strip_tags($post['email']);
        $password = strip_tags($post['password']);
        $level = strip_tags($post['level']);

        // enkripsi pass
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function delete_akun($id_akun) {
        global $db;
        $query = "DELETE FROM akun WHERE id_akun = $id_akun";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function update_akun($post) {
        global $db;
        $id_akun = strip_tags($post['id_akun']);
        $nama = strip_tags($post['nama']);
        $username = strip_tags($post['username']);
        $email = strip_tags($post['email']);
        $password = strip_tags($post['password']);
        $level = strip_tags($post['level']);

        // enkripsi pass
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = '$id_akun'";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }