<?php

include "config.php";

$nbre_media = $bdd->query("SELECT count(*) AS nb FROM annonces WHERE type = 'Maison'");
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
	
	<div class="titre_section">Annonces Récentes</div>
	<div class="center">
	
	<?php
		$sql = $bdd->query("SELECT * FROM annonces WHERE type = 'Maison' ORDER BY id_a DESC LIMIT $page_num,$media_par_Page");
		
		while( $reponse = $sql->fetch(PDO::FETCH_ASSOC) ){
			
		$type = strtolower($reponse['type']);
		$id = $reponse['id_a'];
		$gallery = "zgallery" . $id;
	?>
		<div class="article">
			<div class="badge_type <?= $type ?>"><?= $reponse['type']; ?></div>
			<div class="badge_prix <?= $type ?>"><?= $reponse['prix']; ?>€</div>
			<a href="image/<?= $id ?>-1.jpg" class="zoombox <?= $gallery ?>"><img src="image/<?= $id ?>-1.jpg" alt="" class="cover"></a>
			<a href="image/<?= $id ?>-2.jpg" class="zoombox <?= $gallery ?>"><img src="image/<?= $id ?>-2.jpg" alt="" class="" style="display : none"></a>
            <a href="image/<?= $id ?>-3.jpg" class="zoombox <?= $gallery ?>"><img src="image/<?= $id ?>-3.jpg" alt="" class="" style="display : none"></a>
			<div class="p_infos" data-num="<?= $id ?>">⬤⬤⬤</div>
			<div class="contenu_article" id="<?= $id ?>">
				<div class="titre_article"><?= $reponse['nom']; ?></div>
				<ul class="argument_article">
					<li><?= $reponse['surface']; ?> m²</li>
					<li><?= $reponse['piece']; ?> Piéces</li>
					<li><?= $reponse['chambre']; ?> Chambres</li>
					<li><?= $reponse['sdb']; ?> SDB</li>
					<li><?= $reponse['parking']; ?></li>
					<li><?= $reponse['internet']; ?></li>	
					<li class="ville"><?= $reponse['lieu']; ?></li>
				</ul>
				<a href="contact.php?id=<?= $id; ?>" class="button_contact">Contactez l'annonceur</a>
			</div>
		</div>
		
<?php } ?>

		<div class="ch_page_content">
					<?php 
						for($i = 1; $i<= $nbres_pages; $i++) {
								if($_GET['page'] == $i){
										echo "<div class=\"ch_page_active\">".$i."</div>";
								}else{
									echo "<a class=\"ch_page\" href='maison.php?page=".$i."'>".$i."</a>";
								}
						}
					?>
			</div>
		
		
		
	</div>


	<?php include "footer.php"; ?>
	</body>
</html>