<?php
  session_start();
  echo $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>SiNovel</title>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">SiNovel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="novels.php">Novels</a>
            </li>
            <?php 
            if(isset($_SESSION['level']) && $_SESSION['level'] == "admin"): ?>
            <li class="nav-item">
            <a class="nav-link" href="input_novel.php">Input Novels</a>
            </li>
            <?php endif; ?>

            <?php 
            if(isset($_SESSION['level']) && !empty($_SESSION['level'])): ?>
                <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Account
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="controller/logout.php">Logout</a></li>
            </ul>
            </li>
            <?php else: ?>
            <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
            </li>
            <?php endif; ?>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Full Page Image Header with Vertically Centered Content -->
    <div class="container" >
        <div class="col-12">