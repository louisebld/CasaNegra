function rempliinscri(){
    // Savoir si les champs sont remplis
    champ = '';
    // on intialise la variable à ''
    
    // carac : de quoi doit être composée l'adresse mail
    var carac = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
    // on récupère avec l'id     
    // si le nom est vide  
    if(document.getElementById("nominscri").value == ""){
        champ += "\n 'le nom";
    }
    // si le prénom est vide
    if(document.getElementById("prénominscri").value == ""){
        champ += "\n 'le prénom'";
    }
    // si le l'email est vide
    if(document.getElementById("emailinscri").value == ""){
        champ += "\n 'lemail'";
    }
    // si le mdp est vide
    if(document.getElementById("mdp1inscri").value == ""){
        champ += "\n 'Le mot de passe'";
    }
    // si la confirmation du mdp est vide
    if(document.getElementById("mdp2inscri").value == ""){
        champ += "\n 'La confirmation du mot de passe'";
    }
    // si le les mots de passes ne sont pas les mêmes
    if(document.getElementById("mdp1inscri").value != document.getElementById("mdp2inscri").value) {
        champ += "\n 'Les mots de passes ne correspondent pas'";

    }
    // if (carac.test(document.getElementById("emailinscri").value)){
    //     champ += "\n 'L'adresse mail n'est pas au bon format";

    // }

    //    if ((document.getElementById("emailinscri").value).match(carac)){
    //     champ += "\n 'L'adresse mail n'est pas au bon format";

    // }
    // https://www.journaldunet.fr/web-tech/developpement/1202967-comment-verifier-une-adresse-mail-en-javascript/
    // https://waytolearnx.com/2019/09/verifier-la-validite-dun-email-avec-javascript.html
    
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
