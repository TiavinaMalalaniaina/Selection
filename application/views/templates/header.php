<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome-5/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/loadingBar/dist/loading-bar.min.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/loadingBar/dist/loading-bar.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="<?php echo site_url('assets/images/logo-StudArd.png')?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex liens" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Emploie du temps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Projet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mes Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mon compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link deconnect" href="#"><i class="fas fa-power-off"></i></a>
                </li>
                </ul>
          </div>
        </div>
    </nav>