<?php

include "config.php";

if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0){
		$id = $_GET['id'];
		$result = $bdd->query("SELECT * FROM annonces WHERE id_a = $id");
		$result = $result->fetch();
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
			<div class="titre_section">Contact </div>
			<div class="center">
			<?php if(isset($_SESSION['email'])){ ?>
				<form action="" method="post" class="connect_inscri">
					<input type="text" name="name" id="" placeholder="Nom Complet" value="<?= $_SESSION['pseudo']; ?>">
					<input type="text" name="email" id="" placeholder="Adresse Email" value="<?= $_SESSION['email']; ?>">
					<input type="text" name="email" id="" placeholder="Référence de l'annonce (#12345)" value="#<?= $id . " - " . $result['nom'] ?>">
					<textarea placeholder="Votre message"></textarea>
					<input type="text" name="captcha" id="" placeholder="12 + 1 = ?">
					<input type="submit" value="Envoyer" name="submit"> 
				</form>
				<?php }else{ ?>
					<br>
					<h3 style="color:red; font-wieght:bolder;">Veuillez vous connecter pour contactez l'annonceur ! </h3>
					<br><br><br><br>
				<?php } ?>
			</div>
			<?php include "footer.php"; ?>
	</body>

	</html>