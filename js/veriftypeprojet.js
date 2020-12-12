function remplitypeprojet(){
    champ = '';
 
    if(document.getElementById("newType").value == ""){
        champ += "\n 'Le type'";
    }
 
    if(champ == ""){
        return true;
    }
    else{
        alert("Les champs suivants doivent être remplis :" + champ);
        return false;
    }
}
