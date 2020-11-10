<script>
i=0;
function diaporamaSuivant() {
     var tabImages = new Array("images/diapo1.jpg", "images/diapo2.jpg","images/diapo3.jpg","images/diapo4.jpg","images/diapo5.jpg","images/diapo6.jpg","images/diapo7.jpg","images/diapo8.jpg","images/diapo9.jpg","images/diapo10.jpg","images/diapo11.jpg");
     document.getElementById("diaporama").src = tabImages[i];
     i++;
     setTimeout(diaporamaSuivant,5000); //5000 pour changer d'images toutes les 5 secondes.
}
</script>
<html>
<body onload="diaporamaSuivant();">
<div id="diapo">
<img src="images/diapo1.jpg" id="diaporama" />
     </div>
<body>
</html>
