function remplimetier(){
    champ = '';
 
    if(document.getElementById("metier").value == ""){
        champ += "\n 'Le métier'";
    }

    if(champ == ""){
        return true;
    }
    else{
        alert("Les champs suivants doivent être remplis :" + champ);
        return false;
    }
}
