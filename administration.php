<?php

include "config.php";

if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0){
	$del = $bdd->query("DELETE FROM annonces WHERE id_a = " . $_GET['id']);
	header('Location: administration.php');
}

$nbre_media = $bdd->query("SELECT count(*) AS nb FROM annonces");
$nbre_media = $nbre_media->fetch();

$media_par_Page = 9;

$nbres_pages = ceil($nbre_media['nb'] / $media_par_Page);

if(!isset($_GET['page'])) {

	$_GET['page'] = 1;
}

$page_num = ($_GET['page']-1) * $media_par_Page;

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
	
	<div class="titre_section">Administration
		<a href="ajouter.php" class="ajouter">Ajouter une annonce</a>
	</div>
	
	

	<div class="administration">
		
		<?php
		
		$sql = $bdd->query("SELECT * FROM annonces ORDER BY id_a DESC LIMIT $page_num,$media_par_Page");
		
		while( $reponse = $sql->fetch(PDO::FETCH_ASSOC) ){
		
		?>
		
		<div class="a_content">
			<img src="image/<?= $reponse['id_a']; ?>.jpg" alt="" class="a_img"><!--
	 --><div class="a_desc">
				<div class="a_title"><?= $reponse['nom']; ?></div>
				<a href="administration.php?id=<?= $reponse['id_a']; ?>" class="delete_article">Supprimer</a>
				<a href="" class="a_id">#<?= $reponse['id_a']; ?></a>
			</div>
		</div>
		
		<?php } ?>
</div>
		
	<div class="ch_page_content">
		<?php
			for($i = 1; $i<= $nbres_pages; $i++) {
					if($_GET['page'] == $i){
							echo "<div class=\"ch_page_active\">".$i."</div>";
					}else{
						echo "<a class=\"ch_page\" href='administration.php?page=".$i."'>".$i."</a>";
					}
			}
		?>	
	</div>
	<?php include "footer.php"; ?>
	</body>
</html>