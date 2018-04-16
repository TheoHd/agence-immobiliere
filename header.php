	<?php

	?>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script type="text/javascript" src="zoombox/zoombox.js"></script>
  <link href="zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript">
		jQuery(function($){
			 $('a.zoombox').zoombox({
	     	   theme       : 'zoombox',
	        	opacity     : 0.8,
	        	animation   : true,
	        	width       : 600,
	        	height      : 400,
	        	gallery     : true,
	        	autoplay : false
	    	});
		});
    </script>
    
	<header>
		<div class="image_principale">
			<a href="index.php" class="nom_site">Site immobilier</a>
			<div class="connec_header">
			
			<?php if(!isset($_SESSION['connecte'])) { ?>
			
				<a href="connexion.php">Connexion</a><!--
				--><span class="sepa_co"> / </span><!--
		 --><a href="inscription.php">Inscription</a>
		 
	 		<?php }else{ ?>
	 		
		 		<div class="compte">Bonjour
		 		<?php if(isset($_SESSION['level']) && $_SESSION['level'] > 1) { ?> 
		 			<a href="administration.php" ><?= $_SESSION['pseudo'] ?></a>
		 		<?php }else{ ?>
		 			<span><?= $_SESSION['pseudo'] ?></span>
		 		<?php } ?>
		 		</div><!--
				--><span class="sepa_co"> / </span><!--
		 --><a href="logout.php">Déconnexion</a>
		 
		 	<?php } ?>
		 	
			</div>
			<form method="post" action="recherche.php" id="rech" class="recherche">
				<input type="text" name="q" id="">
				<button form="rech"><img src="image/recherche.png" alt=""></button>
			</form>
		</div>
		<ul class="menu">
				<li id="menu1" class="menu_section">
					<a href="maison.php" >Maison</a></li><!--
				--><span class="sepa"> / </span><!--
				--><li id="menu2" class="menu_section">
				<a href="appartement.php" >Appartement</a></li><!--
				--><span class="sepa"> / </span><!--
				--><li id="menu3" class="menu_section">
				<a href="loft.php" >Loft / Studio</a></li><!--
				--><span class="sepa"> / </span><!--
				--><li id="menu4" class="menu_section">
				<a href="autre.php" >Autre</a></li>
		</ul>
		

					 <div class="menu-icon menu-icon-cross">
						<span></span>
						<svg x="0" y="0" width="4.22vw" height="4.22vw" viewBox="0 0 54 54">
							<circle cx="27" cy="27" r="24"></circle>
						</svg>
					</div>
				
			<div class="recherche_avancee">
				<div class="recherche_avancee_content">
					<form method="post" action="recherche.php">
					
						<input type="checkbox" name="pieces[]" id="p1" value="1">
						<label for="p1">1 pièce</label>
						
						<input type="checkbox" name="pieces[]" id="p2" value="2">
						<label for="p2">2 pièces</label>
						
						<input type="checkbox" name="pieces[]" id="p3" value="3">
						<label for="p3">3 pièces</label>
						
						<input type="checkbox" name="pieces[]" id="p4" value="4">
						<label for="p4">4 pièces </label>
						
						<input type="checkbox" name="pieces[]" id="p5" value="5">
						<label for="p5">5 pièces </label>
						
						<input type="checkbox" name="pieces[]" id="p6" value="6">
						<label for="p6">6 pièces et + </label><br>
 
						<input type="number" name="min" id="" placeholder="Prix minimum">
						 
						<input type="number" name="max" id="" placeholder="Prix maximum"><!--
						
						--><label for="sub">Rechercher</label>
						<input type="submit" name="submit" id="sub" value="">
						
					</form>
				</div>
			</div>
			
	</header>
	<script src="js/jquery.js"></script>
	<script>
		$(document).ready(function(){

		$('.menu-icon').click(function(e){
			e.preventDefault();
			var $t = $(this);
			var $ra = $('.recherche_avancee'); 
			if($t.hasClass('is-opened')){
				$t.addClass('is-closed').removeClass('is-opened');
				$ra.animate({height :0}).hide(1);
			}else{
				$t.removeClass('is-closed').addClass('is-opened');
				$ra.show(1).animate({height :'8vw'});
				
			}
		})
		
		

	});
</script>