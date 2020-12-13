function rempliprojet(){
    // Savoir si les champs sont remplis
    champ = '';
    // on intialise la variable à ''
    // si la date est vide
    if(document.getElementById("date").value == ""){
        champ += "\n 'La date'";
    }

    if(document.getElementById("description").value == ""){
        champ += "\n 'La description'";
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
