
//Initialise la page ajoutStage
function initAjoutStage(){

    console.log("initAjoutStage");

    $.get("../assets/fonction.php?page=1" ,ListeDeroulante);      
    
    $.get("../assets/fonction.php?Entreprise=oui" ,ListeEntreprise);
}

//Rempli la liste déroulante "ListeEleve" avec les élèves récupérés dans la base de données
function ListeDeroulante(data){

    console.log(data);

    let codeHtml = "";

    codeHtml+= "<option value=''>Choisir un élève</option>";

    data.forEach(element => {
       
        codeHtml+= "<option value='"+element.Id_eleve+"'>"+element.Prenom + " " + element.Nom + " / " + element.Specialite +"</option>";
        
    });

    $("#ListeEleve").append(codeHtml);
}

//Rempli la liste déroulante "ListeEntreprise" avec les entreprises récupérés dans la base de données
function ListeEntreprise(data){
    
        console.log(data);
    
        let codeHtml = "";
        let txtHTML = "";
        let idMax = 0;
    
    
        data.forEach(element => {
        
            codeHtml+= "<option value='"+element.Id_entreprise+"'>"+element.NomEntreprise +"</option>";
            idMax = element.Id_Entreprise;
        });

        txtHTML += "<option value='"+ idMax +"'>Choisir une entreprise</option>";
        txtHTML += codeHtml;
    
        $("#ListeEntreprise").append(txtHTML);
    }


//Fait apparaitre le formualire d'ajout d'entreprise et disparaitre la liste déroulante
function formEntreprise(){

        let d1 = document.getElementById("d1");
        let d2 = document.getElementById("d2");

        if(getComputedStyle(d1).display != "none"){
            d1.style.display = "none";
            d2.style.display = "block";
          }
}