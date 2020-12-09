function rempliconn(){
    champ = '';
 
    if(document.getElementById("emailconn").value == ""){
        champ += "\n 'l'email'";
    }
 
    if(document.getElementById("mdpconn").value == ""){
        champ += "\n 'Le mot de passe'";
    }
 
    if(champ == ""){
        return true;
    }
    else{
        alert("Les champs suivants doivent être remplis :" + champ);
        return false;
    }
}
