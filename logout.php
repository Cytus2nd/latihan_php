<?php 
    session_start();

    // membatasi sebelum login
    if(!isset($_SESSION['login'])) {
        echo "<script>
                document.location.href = 'login.php'
            </script>";
        exit;
    }

    // kosongkan sesion
    $_SESSION = [];

    session_unset();
    session_destroy();
    header("location: login.php");
