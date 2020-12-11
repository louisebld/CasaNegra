function remplicontact(){

    champ = '';

    if(document.getElementById("telephone").value == ""){
        champ += "\n 'Le téléphone'";
    }

    if(document.getElementById("message").value == ""){
        champ += "\n 'Le message'";
    }


    if(champ == ""){
        return true;
    }
    else{
        alert("Les champs suivants doivent être remplis :" + champ);
        return false;
    }

}
