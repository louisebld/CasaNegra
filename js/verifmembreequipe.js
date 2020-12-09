function remplimembre(){
    champ = '';
 
    if(document.getElementById("nom").value == ""){
        champ += "\n 'Le nom'";
    }
 
    if(document.getElementById("prenom").value == ""){
        champ += "\n 'Le prénom'";
    }

     if(document.getElementById("age").value == ""){
        champ += "\n 'Lage'";
    }
     if(document.getElementById("description").value == ""){
        champ += "\n 'La description'";
    }
     if(document.getElementById("tel").value == ""){
        champ += "\n 'Le téléphone'";
    }
 

    if(champ == ""){
        return true;
    }
    else{
        alert("Les champs suivants doivent être remplis :" + champ);
        return false;
    }
}
