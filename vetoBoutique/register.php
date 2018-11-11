<?php
	session_start();
	require 'admin/database.php';
?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<title>Véto boutique</title>
		<link rel="icon" type="image/png" href="images/paw.jpg"/>

		<meta charset="UTF-8">
		<link href="css/register.css" rel="stylesheet" type="text/css">
		<!--intégration du meta viewport-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<!--intégration du Bootstrap CSS par CDN-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		
	</head>
	<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
		
		 
		<!-- Body------------------------------ -->
		<section>   
				
			   <div class="login-box" >  
			   		<div id="chat">	
            		<img src="images/chat.png" class="avatar"><h3>Inscription</h3>
            		<?php
                    				if(!empty($_SESSION["errors"])){
						            $errors = $_SESSION["errors"];
						            echo '<div class="alert alert-danger ml-5">' . $errors . '</div>';}
               		?>
            	</div>
            	

            		<form class="form-inline" action="traitement.php" method="POST">
                		
	                    <br>
	                      	<p>Nom</p>
	                   		 <input type="text" id="nom" name="user_last" placeholder="votre nom">
	                    

	                   		 <p>Prénom</p>
	                    	<input type="text" id="prenom" name="user_first" placeholder="votre prénom">
	                    
	                	
		                    <p>Adresse</p>
		                    <input type="text" id="adresse" name="user_address" placeholder="votre adresse">

		                    <p>Code postal</p>
		                    <input type="text" id="cp" name="user_pc" placeholder="votre code postal">
		                    
		                    <p>Ville</p>
		                    <input type="text" id="ville" name="user_city" placeholder="Ville">
		                    
		                    <p>E-mail</p>
		                    <input type="text" id="name" name="user_email" placeholder="votre email">
		                    

		                    <p>Mot de passe</p>
		                    <input type="password" id="password" name="user_pwd" placeholder="votre mot de passe">
	                    

	                    	<input class="btn" type="submit" name="submit" value="Valider">
	                    <br><br>
							 

            		</form>
            		
        		</div>

		</section>
				
		
	<!--------SCRIPTS--------------------------------------------------------->

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	
</body>	
</html>