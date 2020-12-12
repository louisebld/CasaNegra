function remplicontact(){
    // Savoir si les champs sont remplis
    champ = '';
    // on intialise la variable à ''
    // on récupère avec l'id     

    // si le téléphone est vide
    if(document.getElementById("telephone").value == ""){
        champ += "\n 'Le téléphone'";
    }
    // si le message est vide
    if(document.getElementById("message").value == ""){
        champ += "\n 'Le message'";
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
