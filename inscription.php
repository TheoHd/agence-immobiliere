<?php

include "config.php";

if(isset($_POST['submit'])){
	
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	$email = $_POST['email'];
	$re_email = $_POST['re_email'];
	$pseudo = $_POST['pseudo'];
	$captcha = $_POST['captcha'];
	
	if(isset($password) && !empty($password) && isset($re_password) && !empty($re_password) && isset($email) && !empty($email) && isset($re_email) && !empty($re_email) && isset($pseudo) && !empty($pseudo) && isset($captcha) && !empty($captcha)){
		
		$captcha = (int) $captcha;
		
		if($captcha == 13){

			if($email == $re_email){
				if($password == $re_password){
					
					$mdp = sha1($password);
					$requete = $bdd->query("INSERT INTO users (pseudo, email, mdp) VALUES ('$pseudo', '$email', '$mdp')");
					$reponse = $requete->rowCount();
					if($reponse != 0){
						
							header('Location: connexion.php');
						
					}else{
						$erreur = "Erreur lors de l'enregistrement, veuillez ressayer plus tard !";
					}
					
				}else{
					$erreur = "Les deux mdp ne correspondent pas !"; }
				
			}else{
				$erreur = "Les deux adresses emails ne correspondent pas !"; }
			
		}else{
			$erreur = "Captcha invalide !"; }
		
	}else{
		$erreur = "Veuillez remplir tout les champs !"; }	
}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Site immobillier</title>
		<link rel="stylesheet" href="style.css"> </head>

	<body> 
	
	<?php include "header.php"; ?>
	
	<div class="titre_section"> 
		<div class="small_title_form">   
			<a href="connexion.php">Connexion</a> /
		</div>
		Inscription
	</div>
	<?php if(isset($erreur)){ echo "<center style='color: red; font-weight: bolder;'>" . $erreur . "</center>"; } ?>
	<form action="" method="post" class="connect_inscri">
			<input type="text" name="pseudo" id="" placeholder="Nom Complet">
			
			<input type="text" name="email" id="" placeholder="Adresse Email">
			<input type="text" name="re_email" id="" placeholder="Retapez votre Adresse Email">
			
			<input type="password" name="password" id="" placeholder="Mot de passe">
			<input type="password" name="re_password" id="" placeholder="Retapez votre Mot de passe">
			
			<input type="text" name="captcha" id="" placeholder="12 + 1 = ?">
			<input type="submit" value="Se connecter" name="submit">
		</form>

	<?php include "footer.php"; ?>
	</body>
</html>