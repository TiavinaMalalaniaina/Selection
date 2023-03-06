function updateFormValue(matiere, id) {
    var champ = document.getElementById("display-matiere");
    champ.textContent = matiere;

    var matiere = document.getElementById("idMatiere");
    matiere.value = id;
}