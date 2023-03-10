<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-5/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/backOffice.css') ?>">
    <title>Admin page</title>
</head>
<body>

    <div class="container">
          <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <p>
                            <a href="#" class="new deconnect"><i class="fas fa-power-off"></i>  <span>Deconnect</span></a>
                        </p>
                        <h4>Gestion filière</h4>
                        <ul class="liste">
                            <?php foreach ($filieres as $filiere) { ?>
                            <li>
                                <div class="fil">
                                    <?php echo $filiere['valeur'] ?> <a href=""><i class="fas fa-times"></i></a>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <p>
                            <a href="" class="new" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"><i class="fas fa-plus"></i> Nouveau filière</a>
                        </p>
                        <div style="min-height: 120px;">
                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                <div class="card card-body">
                                    <form action="<?php echo site_url('backT/addFiliere') ?>" method="post">
                                        <label for="" class="form-label">Nom de la filière</label>
                                        <input type="text" name="filiere" class="form form-control">
                                        <input type="submit" class="btn btn-success btn-sm mt-3">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Sidebar -->
            <div class="content">
                <p>Nombre d'utilisateur : <strong><?php echo $number ?></strong></p>
                <h3>Publication forum signaler</h3>
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>titre</th>
                        <th>user</th>
                        <th>signaler</th>
                        <th></th>
                    </tr>
                    <?php foreach ($problems as $problem) { ?>
                        <tr>
                            <td><a href="<?php echo site_url('ForumT/detail_forum?idforum_problem='.$problem['idforum_problem']) ?>"><?php echo $problem['signal'] ?></a></td>
                            <td><?php echo $problem['problem'] ?></td>
                            <td><?php echo $problem['nom'] ?></td>
                            <td><?php echo $problem['signal'] ?></td>
                            <td><a href="<?php echo site_url('BackT/drop?idforum_problem='.$problem['idforum_problem']); ?>"><i class="fas fa-times"></i></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

    </div>

<!-- FOOTER -->
<?php $this->load->view("templates/footer") ?>
<!-- FOOTER -->