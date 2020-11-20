<?php
/*
// Envoi du formulaire pour créer un projet
// Vérification

// init tab
$erreur=[];


// POUR L'AJOUT

if (isset($_POST['action'])) {


// nom vide
	if (empty($_POST["nom"]) && !trim($_POST['nom'])) {
		$erreur[]="Nom vide";
	}
// date vide
	if (empty($_POST["date_creation"]) && !trim($_POST['date_creation'])) {
		$erreur[]="Date de creation vide";

// auteur vide
	}

	if (empty($_POST["autor"]) && !trim($_POST['autor'])) {
		$erreur[]="Auteur vide";
	}

// description vide

	if (empty($_POST["description"]) && !trim($_POST['description'])) {
		$erreur[]="Description vide";
	}

// verifier si la date est valide (déja passée)

	if(datepaspasse($_POST["date_creation"])){
		$erreur[]="Cette date n'est pas encore passée";
	}
// verifier si le projet n'existe pas deja 

	if(projetexiste($_POST["nom"])){
		$erreur[]="Ce projet existe deja";

	}

// verifier si l'auteur existe

	if(auteurexistepas($_POST["autor"])){
		$erreur[]="Cet auteur n'existe pas";

	}



	if (count($erreur)>0) {

		$_SESSION["erreur"]= $erreur;
		$_SESSION["donnee"]= $_POST;
	}
	else {

		$nom = $_POST['nom'];
		$date_creation = $_POST['date_creation'];
		$autor = $_POST['autor'];
		$description = $_POST['description'];

// creation du projet dans la bdd
		insert_projet($nom, $date_creation, $autor, $description);

		header("Location:index.php?page=connexion");
		
		unset($_SESSION['erreur']);
		unset($_SESSION['donnee']);

	}
}
*/
// Fin la creation du projet

?>


<?php
	//Partie refaite
	$projets = charge_projet($c);
	$nbphotos = charge_nbphotos($c);


   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];

  
      	//if (isset($_POST['date']) && isset($_POST['autor']) && isset($_POST['descrition'])){
	      	//On transporte le fichier dans le dossier image
/*			if(file_exists("../images/dispo12.php")){
				unlink("../images/dispo12.php");
			}*/
			//Place it into your "uploads" folder mow using the move_uploaded_file() function
	        move_uploaded_file($file_tmp,"./projets/".$file_name);

	        

/*	        //On le renome pour pouvoir l'ajouter a notre diapo
			$CheminFichier = "projets/". $file_name;
			$CheminCible = "projets/ ". "diapo" . $nbphotos . "." . get_file_extension($file_name);
				
			if (file_exists($CheminFichier)) {

				if (!rename($CheminFichier, $CheminCible)) {
					echo "Probleme pour renommer le répertoire $foldername en $RequeteRefNum<br />\n";
				}
				else {
					echo "Fichier renommé ! <br />\n";
				}
				
			}
			else {
				echo "Le fichier $CheminFichier n'a pas été trouvé.<br />\n";
			}
			*/
			$date_creation = $_POST['date'];
			$autor = $_POST['autor'];
			$description = $_POST['description'];


			insert_projet($autor, $description, $file_name, $date_creation);
	        echo "Success";
	        unset($_FILES['image']);
	        header("Location: index.php?page=projet");
	    //}
   }