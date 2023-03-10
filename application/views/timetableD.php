<!-- IMPORTATION -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/gestion_projet.css">
<script src="<?php echo base_url(); ?>assets/js/gestion_projet.js"></script>
<script src="<?php bu('assets/js/emploie_du_temps_util.js')?>"></script>
<script src='<?php bu('assets/js/fullcalendar-6.1.4/dist/index.global.js')?>'></script>
<link rel="stylesheet" href="<?php bu('assets/css/emploie_du_temps.css')?>">
<title>Gestion d'emploie du temps</title>
<!-- IMPORTATION -->

<!-- HEADER -->
<?php $this->load->view("templates/header") ?>
<!-- HEADER -->

    <div class="container">
        <h1 class="titre mb-3">Gestion d'emploie du temps</h1>
        <div class="rappel">
            <div class="cours" id="cc2"></div>
            <div class="cours" id="cc"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3 matiere">
                <div class="listes-matieres mt-4">
                    <h3 class="entete">Listes de vos matières</h3>
                    <div class="listes">
                        <ul id="ululu">
                            
                        </ul>
                    </div>
                </div>
                
                <!-- Modal -->
                <div class="modal fade entrer-matiere" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="fofo" action="<?php bu('TimeTableD/test2')?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Gestion emploie du temps</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="idmatiere" id="idmatiere" value="">
                                <h4>Matière : <span id="display-matiere">Mathématique</span></h4>
                                <select name="jour" id="sele" class="form-select mt-3">
                                        
                                </select>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Heure debut</label>
                                        <input type="time" name="debut" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Heure fin</label>
                                        <input type="time" name="fin" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="fafa" id="">
                                        <label for="" class="form-label">Fafana ze mfanindry</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" id="btn" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

                <div class="ajouter-matiere mt-5">
                        <form action="<?php bu('TimeTableD/test3')?>" method="GET">
                            <p><i class="fas fa-book"></i> Ajouter nouvelle matière</p>
                            <input type="text" class="form-control" placeholder="Nom du matière" name="matiere">
                            <button class="btn btn-info mt-3" type="submit">Ajouter</button>
                        </form>
                </div>
            </div>
            
            <div class="col-md-9 programmes">
                <h3 class="mb-3">Programmes hebdomadaires</h3>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
    <script src="<?php bu('assets/js/emploie_du_temps.js')?>"></script>
    <script>
        window.addEventListener("load", function () {
            var xhr; 
            try {  
                xhr = new ActiveXObject('Msxml2.XMLHTTP');   
            }
            catch (e) {
                try {   
                    xhr = new ActiveXObject('Microsoft.XMLHTTP'); 
                }
                catch (e2) {
                    try {  
                        xhr = new XMLHttpRequest();  
                    }
                    catch (e3) {  
                        xhr = false;   
                    }
                }
            }
            xhr.onreadystatechange  = function() { 
                if(xhr.readyState  == 4){
                    if(xhr.status  == 200) {
                        var p = JSON.parse(xhr.responseText)
                        cal(p[2])
                        ululu(p[0])
                        sele(p[1][0])
                        cc(p[3])
                        var cc2 = document.getElementById("cc2");
                        cc2.innerHTML = "<i class=\"far fa-calendar-check verifier\"></i> "+p[4]
                    } else {
                        document.dyn="Error code " + xhr.status;
                    }
                }
            }; 
            xhr.open("GET", "<?php bu('TimeTableD/test')?>",  false);    
            xhr.send(null);   
        })
    </script>

<!-- FOOTER -->
<?php $this->load->view("templates/footer") ?>
<!-- FOOTER -->