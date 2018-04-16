<?php

include "config.php";

if(isset($_POST['submit'])){
	
	$titre = $_POST['titre'];
	$prix = $_POST['prix'];
	$type = $_POST['type'];
	$surface = $_POST['surface'];
	$piece = $_POST['piece'];
	$chambre = $_POST['chambre'];
	$sdb = $_POST['sdb'];
	$parking = $_POST['parking'];
	$internet = $_POST['internet'];
	$lieu = $_POST['lieu'];
	$contact = $_SESSION['id'];
	

	if(isset($titre) && !empty($titre) && isset($prix) && !empty($prix) && 
		 isset($type) && !empty($type) && isset($surface) && !empty($surface) && isset($piece) && !empty($piece) && isset($chambre) && !empty($chambre) && isset($sdb) && !empty($sdb) && isset($parking) && !empty($parking) && isset($internet) && !empty($internet) && isset($lieu) && !empty($lieu)){
		
		$requete = $bdd->query("INSERT INTO annonces (nom, prix, type, surface, piece, chambre, sdb, parking, internet, lieu, vendeur) VALUES ('$titre', $prix, '$type', $surface, $piece, $chambre, $sdb, '$parking', '$internet', '$lieu', '$contact')");
		
		if($requete->rowCount() != 0){
			
			$lastid = $bdd->lastInsertId();
			
			if ($_FILES['img_annonce']['error'] > 0) $erreur = "Erreur lors du transfert";
			if ($_FILES['img_annonce']['size'] > 3000000) $erreur = "Le fichier est trop gros";

			$extensions_valides = array('jpg','jpeg','gif','png');
			$extension_upload = strtolower(  substr(  strrchr($_FILES['img_annonce']['name'],'.'),1)  );

			$img_link = "image/" . $lastid . "-1.jpg";
			if (in_array($extension_upload,$extensions_valides) ){ 
				 move_uploaded_file($_FILES['img_annonce']['tmp_name'], $img_link); 
			}
			
			if ($_FILES['img_annonce_2']['error'] > 0) $erreur = "Erreur lors du transfert";
			if ($_FILES['img_annonce_2']['size'] > 3000000) $erreur = "Le fichier est trop gros";

			$extensions_valides = array('jpg','jpeg','gif','png');
			$extension_upload = strtolower(  substr(  strrchr($_FILES['img_annonce_2']['name'],'.'),1)  );

			$img_link = "image/" . $lastid . "-2.jpg";
			if (in_array($extension_upload,$extensions_valides) ){ 
				 move_uploaded_file($_FILES['img_annonce_2']['tmp_name'], $img_link); 
			}
			

			header('Location: index.php');
		}		
			
	}else{ 	echo "Veuillez remplir tout les champs !  "; }
}

?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Site immobillier</title>
		<link rel="stylesheet" href="style.css"> 
</head>

<body>
		<?php include "header.php"; ?>
			<div class="titre_section">Ajouter une annonce</div>
			
			<form method="POST" class="add" accept-charset="utf-8" enctype="multipart/form-data">
				
				<input type="text" name="titre" placeholder="Titre de l'annonce" id="add_titre"><br>
				
				<div class="input-file-container">
					<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
					<input class="input-file" id="my-file" type="file" name="img_annonce">
					<label for="my-file" class="input-file-trigger" tabindex="0">Choisir une photo</label>
					<br>
					<input class="input-file" id="my-file" type="file" name="img_annonce_2">
					<label for="my-file" class="input-file-trigger" tabindex="0">Choisir une deuxiéme photo</label>
				</div>
				<p class="file-return"></p><br><br>
				
				<input type="number" name="prix" id="" placeholder="Prix (en €)" class="add_prix">
				<select name="type" class="add_type">
					<option value="Inconnu">Type de biens ?</option>
					<option value="Maison">Maison</option>
					<option value="Appartement">Appartement</option>
					<option value="Loft / Studio">Loft / Studio</option>
					<option value="Autre">Autre</option>
				</select><br>
				
				<input type="number" name="surface" id="" placeholder="Surface  (en m^2)" class="add_surface">
				<input type="number" name="piece" id="" placeholder="Nombre de piéces" class="add_piece"><br>
				
				<input type="number" name="chambre" id="" placeholder="Chambres" class="add_chambre">
				<input type="number" name="sdb" id="" placeholder="Salles de bain" class="adb_sdb"><br>
					
				<select name="parking" class="add_parking">
					<option value="inconnu">Type de parking ?</option>
					<option value="Garage Privé 1 place">Garage Public 1 place</option>
					<option value="Garage Privé 1 place">Garage Privé 1 place</option>
					<option value="Garage Privé 2 place">Garage Privé 2 place</option>
					<option value="Parking Privé">Parking Privé</option>
					<option value="Parking Public">Parking Public</option>
					<option value="Pas de Parking">Pas de Parking</option>
					<option value="Autre">Autre</option>
				</select>
						
				<select name="internet" class="add_internet">
					<option value="Inconnu">Internet ?</option>
					<option value="ADSL">ADSL</option>
					<option value="ADSL2">ADSL2</option>
					<option value="VDSL">VDSL</option>
					<option value="Fibre Optique">Fibre Optique</option>
					<option value="Internet via satellite">Satellite</option>
					<option value="Autre">Autre</option>
				</select><br>
				
				<input type="text" name="lieu" id="" placeholder="Localisation (Ville, Code Postale)" class="adb_lieu">
				<br>
				<input type="submit" value="Ajouter" name="submit" id="ajouter_btn">
			</form>
			
		<?php include "footer.php"; ?>
		
		<script>

				var fileInput  = document.querySelector( ".input-file" );
				var button     = document.querySelector( ".input-file-trigger" );
				var the_return = document.querySelector(".file-return");


				button.addEventListener( "click", function( event ) {
					 fileInput.focus();
					 return false;
				});

				fileInput.addEventListener( "change", function( event ) {  
						the_return.innerHTML = this.value;  
				});
		</script>
</body>
</html>