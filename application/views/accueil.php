<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-5/css/all.min.css') ?>">
    <script src="<?php echo site_url('assets/js/emploie_du_temps_util.js') ?>"></script>
    <script src='<?php echo site_url('assets/js/fullcalendar-6.1.4/dist/index.global.js') ?>'></script>
    <link rel="stylesheet" href="<?php echo site_url('assets/css/accueil.css') ?>">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="bienvenue">
                    <p><a href="" data-bs-toggle="modal" data-bs-target="#motivation"><i class="fas fa-crown"></i></a> Bienvenue, To Mamiarilaza</p>
                </div>
                
                <!-- Modal -->
                <div class="modal fade motivation" id="motivation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Votre motivation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body corp-motivation">
                                <img src="<?php echo site_url('assets/images/motivation.jpg') ?>" alt="">
                                <p>" Ny fianarana no lova tsara indrindra."</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#motivation2">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade motivation" id="motivation2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form action="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier motivation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body corp-motivation">
                                    <label for="" class="form-label">Texte motivant</label>
                                    <input type="text" class="form-control">
                                    <div class="fichier mt-3">
                                        <label type="button" for="inputTag" class="btn btn-outline-success inputTag" ><i class="fas fa-plus-circle"></i>Choisir la photo</label>
                                        <input id="inputTag" type="file" name="userfile" size="20" class="file" onchange="updatePath()">
                                        <p class="path" id="path"></p>
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

                <div class="rappel">
                    <p><i class="far fa-clock"></i> Un cours de Math aura lieu dans 15 min</p>
                </div>
                <h3 class="titre">Programme hebdomadaire</h3>
                <script src="<?php echo site_url('assets/js/emploie_du_temps.js') ?>"></script>
                <div id='calendar'></div>
            </div>
            <div class="offset-md-1 col-md-3">
                <div class="forget">
                    <div class="entete">
                        <p>N'oublie pas</p>
                    </div>
                    <div class="corp">
                        <ul>
                            <?php foreach ($todo as $t) { ?>
                                <li><a href="<?php echo site_url('todoT/done')."?idtodo=".$t['idtodo'] ?>"><?php echo $t['tache'] ?> <i class="fas fa-check"></i></a></li>
                            <?php } ?>
                            <li><a href="" class="add" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="projet">
                    <h4>Vos projet recents</h4>
                    <ul>
                        <li><a href="" class="btn btn-info">Projet Mr Tahina</a></li>
                        <li><a href="" class="btn btn-info">Réalisation hackaton IU</a></li>
                        <li><a href="" class="btn btn-info">Projet Madame Baovola</a></li>
                    </ul>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="<?php echo site_url('todoT/save') ?>" method="post">
                            <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <label for="" class="form-label">Nom du rappel</label>
                                    <input type="text" name="tache" class="form-control">
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