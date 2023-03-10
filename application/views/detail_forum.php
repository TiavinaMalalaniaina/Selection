<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-5/css/all.min.css') ?>">
    <script src="<?php echo site_url('assets/js/detail_forum.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo site_url('assets/css/detail_forum.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/header.css') ?>">
    <title>Detail forum</title>
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

    <div class="container">
        <div class="question row">
            <div class="col-md-2 col-2 image">
                <img src="<?php echo site_url('assets/images/profil.png') ?>" alt="">
            </div>
            <div class="col-md-9 col-9 content">
                <h1><?php echo $problems['problem'] ?></h1>
                <p class="metadata">Publié par <?php echo $problems['nom'] ?>, il y a 2 jour</p>
                <hr>
                <p>
                    <?php echo $problems['description'] ?>
                </p>
            </div>
            <div class="col-md-1 col-1 params">
                <p><a href="">Signaler</a></p>
            </div>
        </div>
        <div class="separation">
            <p>Tous les réponses</p>
        </div>
        <?php foreach ($responses as $response) { ?>
        <div class="commentaires">
            <div class="row coms my-5">
                <div class="col-md-1 col-1 profil">
                    <img src="<?php echo site_url('assets/images/profil.png') ?>" alt="">
                    <br>
                    <label><?php echo $response['nom'] ?></label>
                </div>
                <div class="col-md-9 col-9 reponse">
                    <h5 class="entete">Publié il y a 10 min</h5>
                    <p> <?php echo $response['response'] ?> </p>
                </div>
                <div class="col-md-2 col-2 vote">
                    <a href="<?php echo site_url("ForumT/vote?idforum_response=".$response['idforum_response']."&idforum_problem=".$problems['idforum_problem']); ?>"><i class="far fa-thumbs-up"></i></a> <span><?php echo $response['nbvote'] ?></span> <a href=""><i class="far fa-thumbs-down dislike"></i></a>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="chat">
            <a href="#" onclick="showToast()">
                <img src="<?php echo site_url('assets/images/icone.png') ?>" alt="">
            </a>
        </div>

        <div class="position-fixed toast-position cacher" id="toast-position" style="z-index: 11">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto"><span class="toast-entete"> Votre réponse</span></strong>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" onclick="closeToast()" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <form action="<?php echo site_url('ForumT/addAnswer') ?>" method="post">
                        <input type="hidden" value="<?php echo $problems['idforum_problem'] ?>" name="idforum_problem">
                        <label for="" class="form-label">Votre message</label>
                        <textarea name="response" id="" cols="25" rows="5" class="form-control"></textarea>
                        <input type="submit" class="btn btn-info mt-4" value="Valider">
                    </form>
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
    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>