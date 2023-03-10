<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-5/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/compte.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/header.css') ?>">
    <title>Mon compte</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="<?php echo site_url('assets/images/logo-StudArd.png') ?>" alt=""></a>
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
    

    <div class="container">
        <div class="row">
            <div class="col-md-12 desc">
                <h3><?php echo $user['nom'].' '.$user['prenom'] ?></h3>
                <div class="row">
                    <div class="col-md-5 self">
                        <label for="">Contact</label>
                        <p><?php echo $user['contact'] ?></p>
                    </div>
                    <div class="col-md-5 self">
                        <label for="">Email</label>
                        <p><?php echo $user['email'] ?></p>
                    </div>
                    <hr>
                    <div class="col-md-5">
                        <ul>
                            <li>
                                <div class="detail row">
                                    <div class="col-md-2">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Filière</label>
                                        <p><?php echo $user['filiere'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="detail row">
                                    <div class="col-md-2">
                                        <i class="fas fa-school"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Etablissement</label>
                                        <p><?php echo $user['etablissement'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="detail row">
                                    <div class="col-md-2">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Niveau d'étude</label>
                                        <p><?php echo $user['niveauetude'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="detail row">
                                    <div class="col-md-2">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Carrière envisagée</label>
                                        <p><?php echo $user['carriere'] ?></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="<?php echo site_url('accountT/modif') ?>" class="btn btn-warning mt-4 modif">Modifier</a>
                    </div>
                    <div class="col-md-6 profil">
                        <img src="<?php echo site_url($user['img']) ?>" alt="">
                        <a href="" class="change" data-bs-toggle="modal" data-bs-target="#exampleModal">Changer photo de profil</a>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?php echo site_url('accountT/do_upload') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Changer photo de profil</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="" class="form-label">Choisir la photo</label>
                                        <div class="fichier mt-3">
                                            <label type="button" for="inputTag" class="btn btn-outline-success inputTag" ><i class="fas fa-plus-circle"></i>Choisir la photo</label>
                                            <input id="inputTag" type="file" name="userfile" size="20" class="file" onchange="updatePath()">
                                            <p class="path" id="path"></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <br>
        <p>
            StudArd est un plateforme web pour aider les étudiants à bien gerer ces etudes. <br>
            Nous avons conçue des fonctionnalités innovant, tel que la gestion d'emploie du temps, les blocs notes, rappel des devoirs.
        </p>
        <hr>
        <p>&copy; Hackaton Inter Universitaire</p>
    </div>

    <script>
        function updatePath() {
            var path = document.getElementById('path');
            var file = document.getElementById('inputTag');
            console.log(file.value);
            path.innerHTML = file.value;
        }
    </script>
    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>