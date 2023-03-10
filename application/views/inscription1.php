<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bu('assets/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php bu('assets/fonts/fontawesome-5/css/all.min.css')?>">
    <link rel="stylesheet" href="<?php bu('assets/css/inscription1.css')?>">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <p class="accueil">Inscription<br>
            <p class="text">Veuillez remplir les champs ci-dessous</p>
            <form action="<?php bu('LogT/signuper2')?>" class="form formulaire" method="get">
                <div class="row">
                    <div class="col-md-6 equipe mt-4">
                        <i class="fas fa-file-signature"></i>
                        <input type="text" class="form-control" name="nom" placeholder="Votre nom" value="<?php echo $nom?>" required>
                    </div>
                    <div class="col-md-6 equipe mt-4">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" name="prenom" placeholder="Votre prenom" value="<?php echo $prenom?>" required>
                    </div>
                </div>
                <div class="equipe mt-4">
                    <i class="fas fa-phone"></i>
                    <input type="text" class="form-control" name="contact" placeholder="Votre contact" value="<?php echo $contact?>" required>
                </div>
                <div class="equipe mt-4">
                    <i class="fas fa-phone"></i>
                    <input type="date" class="form-control" name="dtn" placeholder="Date de naissance">
                </div>
                <div class="equipe mt-4">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-control" name="email" placeholder="Votre email" value="<?php echo $email?>" required>
                </div>
                <div class="equipe mt-4">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe" value="<?php echo $mdp?>" required>
                </div>
                <div class="equipe mt-4">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control" name="mdp2" placeholder="Confirmer votre mot de passe" value="<?php echo $mdp?>" required>
                </div>
                <p><a href="<?php bu('LogT/index')?>">Déja membre ?</a></p>
                <button type="submit" class="btn btn-info mt-2 connexion">Suivant</button>
            </form>
        </div>
    </div>
    <script src="<?php bu('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>