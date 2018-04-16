<?php


include "config.php";

if(sizeof($_POST) > 0){
	
	if(isset($_POST['q'])  && !empty($_POST['q'])){
		$q .= "q=". $_POST['q'] . "&";
	}
	
	if(isset($_POST['max'])  && !empty($_POST['max'])){
		$q .= "max=". $_POST['max'] . "&";
	}
	
	if(isset($_POST['min'])  && !empty($_POST['min'])){
		$q .= "min=". $_POST['min'] . "&";
	}
	
	if(isset($_POST['pieces'])  && !empty($_POST['pieces'])){
			
				$q .= "piece=" . implode($_POST['pieces'], '-') . "&";	
	}
	
	header('Location:recherche.php?' . $q);
}

if(sizeof($_GET) > 0){
	
	if(isset($_GET['q'])){	
		if($x > 0) {
			$sql_req = $sql_req .  " AND nom LIKE '%". $_GET['q'] . "%'";
		}else{
			$sql_req = $sql_req . " nom LIKE '%". $_GET['q'] . "%'";
			$x++;
		}
	}
	
	if(isset($_GET['max'])){
		if($x > 0) {
			$sql_req = $sql_req . " AND prix <= ". $_GET['max'];
		}else{
			$sql_req = $sql_req . " prix <= ". $_GET['max'];
			$x++;
		}
	}
	
	if(isset($_GET['min'])){
		if($x > 0) {
			$sql_req = $sql_req . " AND prix >= ". $_GET['min'];
		}else{
			$sql_req = $sql_req . " prix >= ". $_GET['min'];
			$x++;
		}
	}
	
	if(isset($_GET['piece'])){
		if($x > 0) {
			$sql_req .= " AND (";
		}else{
			$sql_req .= " (";
			$x++;
		}
		
		$res = explode( '-', $_GET['piece']);
		
		for($i = 0; $i < sizeof($res) ; $i++){
			if($i == sizeof($res) - 1){
				$sql_req .= " piece = " . $res[$i] . ")";
			}else{
				$sql_req .= " piece = " . $res[$i] . " OR ";
			}
		}
	}
	
}


if(isset($sql_req)){
	$sql_count = "SELECT count(*) AS nb FROM annonces WHERE " . $sql_req;
}else{
	$sql_count = "SELECT count(*) AS nb FROM annonces";
}

$nbre_media = $bdd->query($sql_count);
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
	
	<div class="titre_section">Recherche</div>
	<div class="center">
	
	<?php
		if(isset($sql_req) && !empty($sql_req)){
			$sql_req .= " ORDER BY id_a DESC LIMIT $page_num,$media_par_Page";
			$sql_q = "SELECT * FROM annonces WHERE " . $sql_req;
		}else{
			$sql_q = "SELECT * FROM annonces ORDER BY id_a DESC LIMIT $page_num,$media_par_Page";
		}
		
		$query = $bdd->query($sql_q);
		while( $reponse = $query->fetch(PDO::FETCH_ASSOC) ){
		$type = strtolower($reponse['type']);
		$id = $reponse['id_a']
	?>
		<div class="article">
			<div class="badge_type <?= $type ?>"><?= $reponse['type']; ?></div>
			<div class="badge_prix <?= $type ?>"><?= $reponse['prix']; ?>€</div>
			<img src="image/<?= $id ?>.jpg" alt="" class="cover">
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
									$lien_page = str_replace("&page=" . $_GET['page'], "", $_SERVER['QUERY_STRING']);
									echo "<a class=\"ch_page\" href='recherche.php?" . $lien_page . "&page=$i'>" . $i . "</a>";
								}
						}
					?>
			</div>
		
		
		
	</div>


	<?php include "footer.php"; ?>
	</body>
</html>