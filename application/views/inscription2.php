<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bu('assets/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php bu('assets/fonts/fontawesome-5/css/all.min.css')?>">
    <link rel="stylesheet" href="<?php bu('assets/css/inscription2.css')?>">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <p class="accueil">Détail de l'étudiant<br>
            <p class="text">Veuillez remplir les champs ci-dessous</p>
            <form action="<?php bu('LogT/signuper3')?>" class="form formulaire" method="get">
                <div class="row">
                    <div class="col-md-12">
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Filière</label>
                            <select name="fil" id="" class="form-select">
                                <?php 
                                for ($i=0; $i < count($fil); $i++) { 
                                    ?>
                                    <option value="<?php echo $fil[$i][0] ?>"><?php echo $fil[$i][1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Etablissement</label>
                            <select name="etab" id="" class="form-select">
                            <?php 
                                for ($i=0; $i < count($etab); $i++) { 
                                    ?>
                                    <option value="<?php echo $etab[$i][0] ?>"><?php echo $etab[$i][1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Niveau d'étude</label>
                            <select name="niv" id="" class="form-select">
                            <?php 
                                for ($i=0; $i < count($niv); $i++) { 
                                    ?>
                                    <option value="<?php echo $niv[$i][0] ?>"><?php echo $niv[$i][1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Carrière envisagée</label>
                            <select name="car" id="" class="form-select">
                            <?php 
                                for ($i=0; $i < count($car); $i++) { 
                                    ?>
                                    <option value="<?php echo $car[$i][0] ?>"><?php echo $car[$i][1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Decris tes specialites</label>
                            <textarea name="specialite" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <p><a href="<?php bu('LogT/signuper1')?>">Precedent</a></p>
                <button type="submit" class="btn btn-info mt-4 connexion">Valider</button>
            </form>
        </div>
    </div>
    <script src="<?php bu('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>