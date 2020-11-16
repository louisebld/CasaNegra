var diapositive = 1;
var timeout = -1;

function boutons(n) {
	clearTimeout(timeout);
  affichage(diapositive += n);

}


function affichage(n) {
  var i;
  var diapoImg = document.getElementsByClassName("diapo");
  if (n > diapoImg.length) {diapositive = 1}    
  if (n < 1) {diapositive = diapoImg.length}
 /* ------------------- animation ----------------------------*/
  for (i = 0; i < diapoImg.length; i++) {
     
	 diapoImg[i].style.opacity = "0";
  }
 
  diapoImg[diapositive-1].style.opacity = "1";  
 timeout = setTimeout(function(){boutons(1);}, 3000);

}
affichage(diapositive);


