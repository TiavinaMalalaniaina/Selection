<?php
    echo var_dump($problems);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-5/css/all.min.css') ?>">
    <script src="<?php echo site_url('assets/js/listes_forum.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo site_url('assets/css/listes_forum.css') ?>">
    <title>Bienvenue dans forum</title>
</head>
<body>
    <div class="container">
        <div class="accueil">
            <h1>Bienvenue dans le Forum <img src="<?php echo site_url('assets/images/forum-image.png') ?>" alt=""></h1>
            <p>Cette communautés est crée pour éviter les bloquage 
            a long terme <br> sur un sujet. On trouve beaucoup d'aide ici</p>
            <h5>Filière : <span><?php echo $user['filiere'] ?></span></h5>
        </div>
        <div class="entete">
            <div class="demande">
                <a href="" class="btn btn-info mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus"></i> Poser une question</a>
            </div>
            
            <!-- Modal -->
            <div class="add-question modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo site_url('ForumT/addProblem') ?>" method="post">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" name="idfiliere" value="<?php echo $user['idfiliere'] ?>">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="mt-3">
                                <label for="problem" class="form-label">Titre</label>
                                <input type="text" placeholder="Votre question ici " class="form-control" name="problem">
                            </div>
                            <div class="mt-3">
                                <label for="desc" class="form-label">Description</label>
                                <textarea name="desc" class="form-control" id="desc" cols="30" rows="7" placeholder="Description du problème"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            
            <div class="recherche mt-3">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6 champ">
                            <input type="text" name="mot" class="form-control finder" placeholder="Recherche discussion">
                        </div>
                        <div class="col-md-6 champ">
                            <button type="submit" class="btn btn-info"><i class="fas fa-search mx-2"></i> Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="discussion mt-4">
                <?php foreach ($problems as $problem) { ?>
                    <a href="<?php echo site_url('ForumT/detail_forum?idforum_problem='.$problem['idforum_problem']) ?>">
                        <div class="row theme mt-3">
                            <div class="col-1 col-md-1">
                            <img src="<?php echo site_url('assets/images/profil.png') ?>" alt="">
                        </div>
                        <div class="offset-1 offset-md-1 col-8 col-md-8 text-content">
                            <div>
                                <h4><?php echo $problem['problem'] ?></h4>
                                <p>Par <?php echo $problem['nom'] ?>, il y a <?php echo timespan( strtotime($problem['date_problem']), now() ) ?></p>
                            </div>
                        </div>
                        <div class="col-2 col-md-2 comment">
                            <i class="far fa-comment"></i> <?php echo $problem['nbresponse'] ?>
                        </div>
                    </div>
                </a>
                <?php } ?>

            </div>
        </div>
    </div>

    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>