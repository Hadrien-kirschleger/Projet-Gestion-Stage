
//Initialise la page ajoutStage
function initAjoutStage(){
    console.log("initAjoutStage");
    $.get("../assets/fonction.php?page=1" ,ListeDeroulante);            
}

//Rempli la liste déroulante "ListeEleve" avec les élèves récupérés dans la base de données
function ListeDeroulante(data){

    console.log(data);

    let codeHtml = "";

    codeHtml+= "<option value=''>Choisir un élève</option>";

    data.forEach(element => {
       
        codeHtml+= "<option value='"+element.Id_Eleves+"'>"+element.Prenom + " " + element.Nom + " / " + element.Specialite +"</option>";
        
    });

    $("#ListeEleve").append(codeHtml);
}