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
		<?php include('includes/nav.php'); ?>
			      <!--  Body---------------------- -->
		<div class="container admin" style="margin-top: 10rem;">
            <div class="row">
                <h1 class="hadmin"><strong>Liste des items  </strong><a href="insert.php" class="btn btn-success btn-lg"><i class="fas fa-plus"></i> Ajouter</a></h1>

                <table class="table table-striped table-bordered" style="color: #fff;">
                    <thead>
                        <tr class="bg-dark">
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php

                    	require 'database.php';

                    	require '../classes/Produit.php';

                    	Produit::getAll();

                    	?>
                    

                    </tbody>

                </table>

            </div>


        </div>
    </body>
    </html>