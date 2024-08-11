<?php session_start(); 
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fitness</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css" rel="stylesheet"/>
    <!-- jquery -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="../css/main.css">

    


</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-bottom text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header justify-content-center">
        
        <?php if(! isset($_SESSION['login'])){echo '<h4 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Требуется авторизация</h4>';}else{ echo '<h4 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Добро пожаловать : '.$_SESSION['username'].'</h4>';} ?>

        
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 text-center">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../">ГЛАВНАЯ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../profile.php">ЛИЧНЫЙ ПРОФИЛЬ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users/camp.php">ТРЕНИРОВОЧНЫЙ ЛАГЕРЬ</a>
          </li>
          <li class="nav-item">
            <?php if(($_SESSION['login'] == 'alex01')){echo '<a class="nav-link active" href="/admin/admin_panel.php">Админ панель</a>';}?>
          </li>
          <li class="nav-item">
            <?php if(! isset($_SESSION['login'])){echo '<a class="nav-link active" href="../login.php">ВОЙТИ</a>';}else{ echo '<a class="nav-link active" href="logout.php">ВЫЙТИ ('.$_SESSION['login'].')</a>';} ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="container-fluid">

