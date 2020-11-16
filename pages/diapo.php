<script>
var diaporama = 1;
affichage(diaporama);

function boutons(n) {
  affichage(diaporama += n);
}


function affichage(n) {
  var i;
  var diapoImg = document.getElementsByClassName("diapo");
  if (n > diapoImg.length) {diaporama = 1}    
  if (n < 1) {diaporama = diapoImg.length}
  for (i = 0; i < diapoImg.length; i++) {
     
	 diapoImg[i].style.opacity = "0";
  }
 
  diapoImg[diaporama-1].style.opacity = "1";  
 /*setTimeout(boutons(1), 3000);*/

}



</script>

<html>
<body>
<div class="cadre-diapo">
<img class="diapo" src="images/diapo1.jpg" alt>
<img class="diapo" src="images/diapo2.jpg" alt>
<img class="diapo" src="images/diapo3.jpg" alt>
<img class="diapo" src="images/diapo4.jpg" alt>
<img class="diapo" src="images/diapo5.jpg" alt>
<img class="diapo" src="images/diapo6.jpg" alt>
<img class="diapo" src="images/diapo7.jpg" alt>
<img class="diapo" src="images/diapo8.jpg" alt>
<img class="diapo" src="images/diapo9.jpg" alt>
<img class="diapo" src="images/diapo10.jpg" alt>
<img class="diapo" src="images/diapo11.jpg" alt>
<button class="precedent" aria-label="précédent" onclick="boutons(-1)">❮</butto>
<button class="suivant" aria-label="suivant" onclick="boutons(1)">❯</button>
</div>

</body>
</html>


