<?php

?>

<script>

var i =0;
var tabimages =['images/diapo1.jpg', 'images/diapo2.jpg','images/diapo3.jpg','images/diapo4.jpg','images/diapo5.jpg','images/diapo6.jpg','images/diapo7.jpg','images/diapo8.jpg','images/diapo9.jpg','images/diapo10.jpg','images/diapo11.jpg']
var temps = 1000;

function changeImage(){

	document.diapo.src= tabimages[i];

	if ( i< tabimages.length -1){
		i++;
	}
	else {
		i=0;
	}

	setTimeout("changeImage()",temps);
}

window.onload = changeImage();


</script>


<?php



?>