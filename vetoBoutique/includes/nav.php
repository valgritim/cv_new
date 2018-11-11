<header class="container-fluid pl-0">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top col-xl-12">
			<img src="images/chat.png" id="logoG">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<a class="navbar-brand" style="font-size:2rem; color:#fff;padding-right: 2rem;">Véto Boutique</a>
				<ul class="navbar-nav" style="list-style-type:none;">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="alimentation.php">Alimentation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="jouets.php">Jouets</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="medocs.php">Médicaments</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Offres spéciales</a>
					</li>
				</ul>

				<?php
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
	</header>