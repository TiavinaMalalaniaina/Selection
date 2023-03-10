<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-5/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/inscription2.css') ?>">
    <title>Modifier profil</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <p class="accueil">Détail de l'étudiant<br>
            <p class="text">Veuillez remplir les champs ci-dessous</p>
            <form action="<?php echo site_url('accountT/modifing') ?>" class="form formulaire" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Filière</label>
                            <select name="fil" id="" class="form-select">
                                <?php foreach ($fil as $f) { ?>
                                    <option value="<?php echo $f[0] ?>"><?php echo $f[1] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Etablissement</label>
                            <select name="etab" id="" class="form-select">
                                <?php foreach ($etab as $e) { ?>
                                    <option value="<?php echo $e[0] ?>"><?php echo $e[1] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Niveau d'étude</label>
                            <select name="niv" id="" class="form-select">
                                <?php foreach ($niv as $n) { ?>
                                    <option value="<?php echo $n[0] ?>"><?php echo $n[1] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="equipe mt-3">
                            <label for="" class="form-label">Carrière envisagée</label>
                            <select name="car" id="" class="form-select">
                                <?php foreach ($car as $c) { ?>
                                    <option value="<?php echo $c[0] ?>"><?php echo $c[1] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info mt-4 connexion">Valider</button>
            </form>
        </div>
    </div>
    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>