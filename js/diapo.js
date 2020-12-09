/*var diapositive = 1;
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

  for (i = 0; i < diapoImg.length; i++) {
     
	 diapoImg[i].style.opacity = "0";
  }
 
  diapoImg[diapositive-1].style.opacity = "1";  
 timeout = setTimeout(function(){boutons(1);}, 3000);

}
affichage(diapositive);


*/

let photosDiapo =document.querySelectorAll(".compGen")
let rightArrow = document.querySelector("#rightArrow")
let leftArrow = document.querySelector("#leftArrow")

let affiché = 0
let nbPhotos = photosDiapo.length

rightArrow.addEventListener("click",function (){
  photosDiapo[affiché].style.visibility = "hidden"
  affiché++
  if (affiché == nbPhotos){
    affiché = 0
  }
  photosDiapo[affiché].style.visibility = "visible"


})

leftArrow.addEventListener("click",function (){
  photosDiapo[affiché].style.visibility = "hidden"
  affiché--
  if (affiché == -1){
    affiché = nbPhotos - 1
  }
  photosDiapo[affiché].style.visibility = "visible"


})