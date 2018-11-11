<?php

session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>

		<title>Véto boutique</title>
		<link rel="icon" type="image/png" href="../images/paw.jpg"/>

		<meta charset="UTF-8">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<!--intégration du meta viewport-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<!--intégration du Bootstrap CSS par CDN-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		
		
	</head>
	<body>
		<div class="container-fluid pl-0">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top justify-content-center"><img src="images/chat.png" id="logoG">

			  	<div class="collapse navbar-collapse" id="navbarNav">
			  		<a class="navbar-brand" style="font-size:2rem; color:#fff;padding-right: 2rem;">Véto Boutique</a>
			    	<ul class="navbar-nav" style="list-style-type:none;">
			      		<li class="nav-item active">
			        	<a class="nav-link" href="../index.php">Accueil</a>
			      		</li>
			 		</ul>
				</div>
			</nav>
			      <!--  Body---------------------- -->

		<div class="container admin col-md-8 bg-dark py-5 px-5" style="margin-top: 10rem;">
            <div class="row ">
             
                <form class="form col-md-6" action="delete.php " method="post" role="form" style="display: column;">
                    <h1 class="text-light"><strong>Supprimer un produit</strong></h1>
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                    <p class="alert alert-warning block">Etes-vous sûr de vouloir supprimer ce produit? </p>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning" method="POST" action="<?php
				                require 'database.php'; require '../classes/Produit.php'; Produit::deleteProduit();?>" disabled>
            		Oui</button>
                        <a class="btn btn-danger " href="index.php ">Non</a>
                    </div>
                </form>
            </div>
        </div>
		   	
     
    </body>
    </html>