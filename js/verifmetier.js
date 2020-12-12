function remplimetier(){
    // Savoir si les champs sont remplis
    champ = '';
    // on intialise la variable à ''

    // si le métier est vide
     if(document.getElementById("newmetier").value == ""){
        champ += "\n 'Le métier'";
    }
 
    // si champ n'a pas changé : tous les champs sont remplis
    if(champ == ""){
        return true;
    }
    else{
        // sinon on indique et on énumère les champs
        alert("Les champs suivants doivent être remplis :" + champ);
        return false;
    }

}
