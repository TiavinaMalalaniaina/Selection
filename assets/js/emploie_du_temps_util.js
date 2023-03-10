function updateFormValue(matiere, id) {
    var champ = document.getElementById("display-matiere");
    champ.textContent = matiere;

<<<<<<< Updated upstream
    var matiere = document.getElementById("idMatiere");
=======
    var matiere = document.getElementById("idmatiere");
>>>>>>> Stashed changes
    matiere.value = id;
}