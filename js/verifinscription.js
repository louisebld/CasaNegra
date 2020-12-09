function rempliinscri(){
    champ = '';
    var carac = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
             
    if(document.getElementById("nominscri").value == ""){
        champ += "\n 'le nom";
    }

    if(document.getElementById("prénominscri").value == ""){
        champ += "\n 'le prénom'";
    }

    if(document.getElementById("emailinscri").value == ""){
        champ += "\n 'lemail'";
    }
    if(document.getElementById("mdp1inscri").value == ""){
        champ += "\n 'Le mot de passe'";
    }

    if(document.getElementById("mdp2inscri").value == ""){
        champ += "\n 'La confirmation du mot de passe'";
    }
    
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
    
    if(champ == ""){
        return true;
    }
    else{
        alert("Les champs suivants doivent être remplis :" + champ);
        return false;
    }
}
