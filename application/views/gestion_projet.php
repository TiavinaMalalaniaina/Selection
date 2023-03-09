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
    <script src="<?php echo base_url(); ?>assets/js/gestion_projet.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/gestion_projet.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header.css">

    <title>Gestion de projet</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">StudArd</a>
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
        <h1>Gestion de projet</h1>
        <div class="row mt-4">
            <div class="col-md-3 project-main">
                <h3 class="mb-3">Listes de vos projet</h3>
                <div class="listes-projet">

                    <?php foreach ($all_projet as $_projet){ ?>
                    <a href="<?php echo base_url(); ?>ProjetJ/filtre/<?php echo $_projet['idprojet']; ?>" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-md-6 titre">
                                <?php echo $_projet['nom']; ?>
                            </div>
                            <div class="col-md-6 progression">
                                <div class="ldBar label-center" data-value="<?php echo $_projet['statue']; ?> " data-preset="line"></div>
                            </div>
                        </div>
                    </a>
                    <?php } ?>

                </div>
                <div class="new-project">
                    <h4>Nouveau projet</h4>
                    <form action="ProjetJ/new_projet" method="post">
                        <label for="" class="form-label">Nom du projet</label>
                        <input type="text" name="nom" class="form-control">
                        <label for="" class="form-label">Deadline</label>
                        <input type="datetime-local" name="deadline" class="form-control">
                        <input type="submit" value="Valider" class="btn btn-info mt-3">
                    </form>
                </div>
            </div>


            <div class="offset-md-1 col-md-8 detail">
                <div class="dropdown">
                    <h3>Avancement <span class="espacement"></span>
                        <button class="btn btn-default" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu mt-1" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#renommer">Renommer</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>ProjetJ/supprimer_projet/<?php echo $projet['idprojet']; ?>">Supprimer</a></li>
                        </ul>
                    </h3>
                </div>
     
                <!-- Modal pour renommer -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <form action="<?php echo base_url(); ?>ProjetJ/new_tache/<?php echo $projet['idprojet']; ?>" method="post" class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title title" id="exampleModalLabel">Ajout nouvelle tâche</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="rename">Nouvelle Tâches</p>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="modal-body">
                            <p class="rename">Duree estimer</p>
                            <input type="number" name="temptotal" class="form-control" min=0 required>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                    </div>
                </div>

                <!-- Modal pour gestionnaire des taches -->
                <div class="modal fade" id="finishtask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <form action="<?php echo base_url(); ?>ProjetJ/tache_partie/<?php echo $projet['idprojet']; ?>" method="post" class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title title" id="exampleModalLabel">Une partie fini</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="rename">Quelle tache</p>
                            <select name="idtache" class="form-control">
                                <?php foreach ($all_tache_projet as $tache) { ?>
                                    <option value="<?php echo $tache['idtache'] ; ?>"><?php echo $tache['nom'] ; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="modal-body">
                            <p class="rename">Temps passe (mn)</p>
                            <input type="number" name="temppasser" class="form-control" min=0 required>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                    </div>
                </div>

                <p><?php echo $projet['statue']; ?> %</p>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $projet['statue']; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="date-limit row">
                    <div class="col-md-1"><i class="far fa-calendar-alt"></i></div>
                    <div class="col-md-4 date"><?php echo $projet['deadline']; ?></div>
                    <div class="col-md-1"> - </div>
                    <div class="col-md-4 date">No deadLine</div>
                </div>
                <div class="jour-restant row mt-3">
                    <div class="col-md-1"><i class="far fa-clock"></i></div>
                    <div class="col-md-5 jour">Temps restant : <span> <?php echo $projet['left_date']; ?> </span></div>
                </div>
                <div class="jour-restant row mt-3">
                    <div class="col-md-1"><i class="far fa-file-alt"></i></div>
                    <div class="col-md-5 jour">Description : </div>
                    <br>
                    <div class="form">
                        <form action="" method="">
                            <textarea value="" cols="20" rows="3" placeholder="Description" class="mt-3 form-control description"></textarea>
                            <input type="submit" class="btn btn-info btn-sm enregistrer" value="Save">
                        </form>
                    </div>
                </div>

                <div class="tache">
                    <h3 class="mt-2">Tâches <span> : </span></h3>
                    <div class="listes-taches">
                        <ul>
                            <?php foreach ($all_tache_projet as $tache) { 
                            if($tache['finish'] == false){ ?>
                            <li><i class="far fa-circle"></i> <?php echo $tache['nom'];?> </li>
                            <?php }else{ ?> 
                            <li><i class="far fa-check-circle"></i> <?php echo $tache['nom'];?> </li>
                            <?php }
                            } ?>
                            <!-- <a href=""><li><i  class="far fa-circle"></i> Emploie du temps </li></a>
                            <a href=""><li><i class="far fa-check-circle"></i> Réalisation de l'hackaton </li></a> -->
                        </ul>
                    </div>
                    <div class="new-task">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus-circle"></i> Nouvelle tâche </button>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#finishtask"> <i class="fas fa-plus-circle"></i> Reduiser la tâche </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="renommer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Renommer le projet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form  action="<?php echo base_url(); ?>ProjetJ/rename/<?php echo $projet['idprojet']; ?>" method="post">
                                    <div class="modal-body">
                                        <label for="" class="form-label">Nouvelle nom</label>
                                        <input type="text" class="form-control" name="nom" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>