function remplimembre(){
    // Savoir si les champs sont remplis
    champ = '';
    // on intialise la variable à ''
    // on récupère avec l'id
    // si le nom est vide
    if(document.getElementById("nom").value == ""){
        champ += "\n 'Le nom'";
    }
    // si le prénom est vide
    if(document.getElementById("prenom").value == ""){
        champ += "\n 'Le prénom'";
    }
    // si  l'age est vide
     if(document.getElementById("age").value == ""){
        champ += "\n 'Lage'";
    }
    // si la description est vide
     if(document.getElementById("description").value == ""){
        champ += "\n 'La description'";
    }
    // si le téléphone est vide
     if(document.getElementById("tel").value == ""){
        champ += "\n 'Le téléphone'";
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
