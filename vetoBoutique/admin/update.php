<?php

session_start();
require 'database.php';
$db = Database::connect();

		if(!empty($_GET['id'])){
    
    		$id = ($_GET['id']);

		} 	

		$statement = $db->prepare('SELECT * FROM produits WHERE id = ?');
		$statement->execute(array($id));
		$item = $statement->fetch();
        $nom_produit = $item['nom_produit'];
        $categorie = $item['categorie'];
        $description = $item['descr_produit'];
        $image = $item['image'];
        $prix = $item['prix'];    
        $stock = $item['stock'];
        $id = $item['id'];

        Database::disconnect();
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
			        			<a class="nav-link" href="admin/index.php">Accueil</a>
			      			</li>
			 			</ul>
				</div>
			</nav>
		</div>
			      <!--  Body---------------------- -->

     <form class="form" action="modifProduit.php" method="post" role="form">   
		<div class="container admin bg-dark mb-5 py-3 px-3" style="color:#fff; margin-top:10rem;">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Modifier une fiche produit</strong></h1>
			        <br>
			        <div class="bg bg-danger">
			        	<?php
                    		if(isset($_SESSION["error"])){
						    $error = $_SESSION["error"];
						    echo $error; }               
						?> 
					</div>
			        <form>
			        	<div class="form-group">
                        	<label><strong>Nom: </strong></label>
                         	<input type="text" class="form-control" id="nom" name="nom_produit" placeholder="nom produit"    value="<?php echo $nom_produit; ?>">
                         	                     	</div>
                       	<div class="form-group">
                            <label><strong>Catégorie: </strong></label>
                            <input type="text" class="form-control" id="nom" name="categorie" placeholder="catégorie" value="<?php echo $categorie; ?>">
                        </div>
                        <div class="form-group">
                            <label><strong>Prix €: </strong></label>
                            <input type="text" class="form-control" id="nom" name="prix" placeholder="prix" value="<?php echo number_format((float)$prix,2, '.', ''); ?>">
                        </div>
                        <div class="form-group">
                            <label><strong>Description: </strong></label>
                            <input type="text" class="form-control" id="nom" name="descr_produit" placeholder="description" value="<?php echo $description; ?>">
                        </div>
                        <div class="form-group">
                            <label><strong>Quantité en stock: </strong></label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="stock" value="<?php echo $stock; ?>">
                        </div>
                        <br>
                    	<div class="form-actions">
                    		<input class="btn btn-warning mr-2" type="submit" name="submit" value="Valider" disabled>
                        	<a class="btn btn-primary" href="index.php"><i class="fas fa-arrow-left"></i> Retour</a>
                    	</div>
                        			
        			</form>

                </div>
                <div class="col-sm-6 site">                    			
                    <img class="mx-5 my-5" src="<?php echo '../images/' . $image ; ?>" alt=" produit" style="width:70%;">
                    <div class="form-group">
                        <label><strong>Index: </strong></label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>"readonly>
                        <label><strong>Image: </strong></label>
                        <input type="text" class="form-control" id="image" name="image" value="<?php echo $image; ?>"readonly>
                        
                    </div>           		        
                </div>
           	</div>
        </div>
    </form>
	</body>
</html>
