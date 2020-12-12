function rempliconn(){
    // Savoir si les champs sont remplis
    champ = '';
    // on intialise la variable à ''
    // on récupère avec l'id     
    // si l'email est vide
    if(document.getElementById("emailconn").value == ""){
        champ += "\n 'l'email'";
    }
    // si le mdp est vide
    if(document.getElementById("mdpconn").value == ""){
        champ += "\n 'Le mot de passe'";
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
