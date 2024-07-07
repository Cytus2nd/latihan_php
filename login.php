<?php 
session_start();
include 'config/app.php';

// cek login
if (isset($_POST['login'])) {
  // ambil inputan user
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // sevret key
  $secret_key = "6LdHPQoqAAAAAJcDz-ICa5ZmTKEMkuYJ03RnhfVP";
  $verifikasi = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='. $secret_key .'&response=' .$_POST['g-recaptcha-response']);
    $response = json_decode($verifikasi);

  if ($response->success) {
    // cek usn
    $result = mysqli_query($db, "SELECT * FROM akun WHERE username='$username'");

    // jika ada user
    if (mysqli_num_rows($result) == 1) {
      //cek pass 
      $hasil = mysqli_fetch_assoc($result);

      if(password_verify($password, $hasil['password'])) {
        // set sessions
        $_SESSION['login'] = true;
        $_SESSION['id_akun'] = $hasil['id_akun'];
        $_SESSION['nama'] = $hasil['nama'];
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['email'] = $hasil['email'];
        $_SESSION['level'] = $hasil['level'];

        // jika login benar arahkan ke file index
        header('location: index.php');
        exit;
      } else {
        // jika tidak ada user/login salah
        $error = true;
      }
    }
  } else {
    $errorRecaptcha = true;
  }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto text-center">
  <form action="" method="POST">
      <h3 class="mb-3"><i class="fas fa-sign-in-alt"></i> Admin Login</h3>
      <?php if(isset($error)) : ?>
        <div class="alert alert-danger text-center">
          <b>Username Atau Password Salah</b>
        </div>
      <?php endif; ?>

      <?php if(isset($errorRecaptcha)) : ?>
        <div class="alert alert-danger text-center">
          <b>Recaptcha Tidak Valid</b>
        </div>
      <?php endif; ?>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Masukkan Username...." required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Masukkan Password...." required>
      <label for="floatingPassword">Password</label>
    </div>
    <div class="mb-3">
      <div class="g-recaptcha" data-sitekey="6LdHPQoqAAAAALzLOqg4ic1ZPsZ5LMrzUyO16cP4">
      </div>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit" name="login">Login</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; cytus-<?= date('Y') ?></p>
  </form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>

    </body>
</html>
