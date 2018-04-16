<?php

include "config.php";

if(isset($_POST['submit'])){
	
	$password = $_POST['password'];
	$email = $_POST['email'];
	$captcha = $_POST['captcha'];
	
	
	
	if(isset($password) && !empty($password) && isset($email) && !empty($email) && isset($captcha) && !empty($captcha)){

		$captcha = (int) $captcha;
		$password = sha1($password);
		
		if($captcha == 13){
			
			$query = "SELECT * FROM users WHERE email = '$email' AND mdp = '$password'";
			$requete = $bdd->query($query);
			$reponse = $requete->rowCount();
			if($reponse != 0){

				$donnees = $requete->fetch();
				$_SESSION['connecte'] = true;
				$_SESSION['id'] = $donnees['id_u'];
				$_SESSION['pseudo'] = $donnees['pseudo'];
				$_SESSION['email'] = $donnees['email'];
				$_SESSION['level'] = $donnees['level'];

				header('Location: index.php');

			}else{
				$erreur = "Email ou Mot de passe incorrect"; }
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
			<div class="titre_section">Connexion
				<div class="small_title_form"> / <a href="inscription.php">Inscription</a> </div>
			</div>
			<?php if(isset($erreur)){ echo "<center style='color: red; font-weight: bolder;'>" . $erreur . "</center>"; } ?>
			<div class="center">
				<form action="" method="post" class="connect_inscri">
					<input type="text" name="email" id="" placeholder="Adresse Email">
					<input type="password" name="password" id="" placeholder="Mot de passe">
					<input type="text" name="captcha" id="" placeholder="12 + 1 = ?">
					<input type="submit" value="Se connecter" name="submit"> </form>
			</div>
			<?php include "footer.php"; ?>
	</body>

	</html>