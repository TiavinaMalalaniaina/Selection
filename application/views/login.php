<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-5/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/login.css') ?>">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <img src="<?php echo site_url('assets/images/profil.png') ?>" class="mb-4" alt="">
            <p class="accueil">Bienvenue dans notre plateforme<br>
            Veuillez vous connecter tout d'abord</p>
            <form action="<?php echo site_url('logT/login'); ?>" class="form formulaire" method="post">
                <div class="equipe mt-4">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" placeholder="Votre nom d'utilisateur" name="username">
                </div>
                <div class="equipe mt-4">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control"  placeholder="Votre mot de passe" name="password">
                </div>
                <p><a href="">Voulez-vous vous inscrire ?</a></p>
                <button type="submit" class="btn btn-info mt-2 connexion">Connexion</button>
            </form>
        </div>
    </div>
    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>