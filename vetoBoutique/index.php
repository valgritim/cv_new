<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>

	<title>Véto boutique</title>
	<link rel="icon" type="image/png" href="images/paw.jpg"/>

	<meta charset="UTF-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<!--intégration du meta viewport-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<!--intégration du Bootstrap CSS par CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


</head>
<body>
	<?php include('includes/nav.php'); ?>
	
				if(empty($_SESSION)){

					echo '<a href="register.php" style="position: absolute; right: 300px; margin-right: 		6rem;color:#fff;"> S\'inscrire <i class="far fa-edit"></i></a>
					<a href="login.php" style="position: absolute; right: 200px; margin-right: 2rem;color:#fff;"> Se connecter <i class="fas fa-sign-in-alt"></i></a>
					<br/>';

				} else {

					echo '<a href="logout.php" style="position: absolute; right: 300px; margin-right: 		6rem;color:#fff;"> Se déconnecter <i class="fas fa-sign-out-alt"></i></a>';

				}

				?>

				<a href="cart.php" style="position: absolute; right: 50px; margin-right: 2rem;color:#fff;"> Votre panier <i class="fas fa-cart-arrow-down"></i></a>
			</div>
		</nav>
	</header> -->

	<div class="row mb-4" style="margin-top: 10rem; color:#fff;">

		<?php 
		if (!empty($_SESSION['u_first']) && isset($_SESSION['u_first']))
		{
			echo '<h1 class="m-auto text-center">Bienvenue chez Véto Boutique ' . $_SESSION['u_first'] . '!</h1>' ;
		} else {

			echo '';
		}
		?>

	</div>
	
	<div class="card mx-5 mt-1 mb-5 py-3 px-3">
		<img src="images/chatAnime.gif" class="avatar">
		<h3 class="text-center"><img src="images/paw.jpg" class="infos"> Les infos du mois</h3>
		<p> Faites des bonnes affaires avec nos bons plans Véto Boutique ! Profitez des prix spéciaux dans notre catégorie "Offres spéciales", des lots économiques, et découvrez également notre gamme de produits estampillés Véto Boutique ! Ces offres sont valables pour une durée limitée et dans la limite des stocks disponibles, alors économisez dès maintenant ! </p>
		<div class="card-body">
			<img class="pub" src="images/offreChat.jpg">
			<img class="pub" src="images/OffreChien.jpg">
		</div>
	</div>
</div>
<!-- -----------FOOTER------ -->
<div class="footer bg-dark">
	<a href="admin/index.php" style="margin-left: 2em;"> Administrateur <i class="fas fa-sign-in-alt"></i></a>

</div>	



<!--------SCRIPTS--------------------------------------------------------->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>	
</html>