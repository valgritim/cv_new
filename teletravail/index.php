<?php

$firstname = $name = $email = $phone = $message = $objet = $file = "";
$firstnameError = $nameError = $emailError = $phoneError = $messageError = $objetError = $fileError = "";
$isSuccess = false;
$emailTo = "vb@valeriebaron.website";



if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$firstname = verifyInput($_POST["firstname"]);
		$name = verifyInput($_POST["name"]);
		$email = verifyInput($_POST["email"]);
		$phone= verifyInput($_POST["phone"]);
		$message = verifyInput($_POST["message"]);
		$objet = verifyInput($_POST["objet"]);
		$isSuccess = true;
		$emailText = "";
		

		// traitement input prenom

		if(empty($firstname)){

			 $firstnameError = "Veuillez rentrer votre prénom";
			 $isSuccess = false;
		}
		else{
			$emailText .= "Prénom: $firstname<br>";
		}
		// traitement input nom

		if(empty($name)){

			$nameError = "Veuillez rentrer votre nom";
			$isSuccess = false;
		}
		else{

			$emailText .= "Nom: $name<br>";
		}
		// traitement input email

		if(!isEmail($email)){

			$emailError = "Veuillez rentrer un email valide";
			$isSuccess = false;
		}
		else{

			$emailText .= "Email: $email<br>";
		}

		// traitement input message
		if(empty($message)){

			$messageError = "Veuillez rentrer un message";
			$isSuccess = false;
		}
		else{

			$emailText .= "Message: $message<br>";
		}
		// traitement input objet

		if(empty($objet)){

			$objetError = "Veuillez rentrer l'objet de votre demande";
			$isSuccess = false;
		}
		else{

			$emailText .= "Objet du message: $objet<br>";
		}
		// traitement input telephone

		if(!isPhone($phone)){

			$phoneError = "Veuillez entrer des chiffres et/ou des espaces";
			$isSuccess = false;
		}
		if(empty($phone)){

			$phoneError = "Veuillez entrer un numéro de téléphone";
			$isSuccess = false;
		}
		else{

			$emailText .= "telephone: $phone<br>";
		}
		// TRAITEMENT DU FICHIER JOINT

		if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0){
			
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['file']['size'] <= 2000000)
        {
        	

                // Testons si l'extension est autorisée

                $infosfichier = pathinfo($_FILES['file']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
                
                if (in_array($extension_upload, $extensions_autorisees)) {
                	
            	//=====Lecture et mise en forme de la pièce jointe.

					$pathfile =  $_FILES['file']['tmp_name'];
					$typepiecejointe = filetype($pathfile);
					$data = chunk_split( base64_encode(file_get_contents($_FILES['file']['tmp_name'])));
					$isSuccess = true;
                }
        }
        else{
        	echo " le fichier est trop lourd, maxi 2 mo";
        	$isSuccess = false;
    		}
    	}

	}
		
		// utilisation fonction php pour envoi email(adresse, message, concatenation des infos, entete de l email qui correspond a toutes les infos et à qui je dois reply to)
		if($isSuccess){
		$mon_fichier = $_FILES['file']['name'];
			
			//header for sender info
		$headers = "From: $firstname $name"." <".$email.">";

		//boundary 
		$semi_rand = md5(time()); 
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

		//headers for attachment 
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

		//multipart boundary 
		$corps_message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"utf-8\"\n" . "Content-Transfer-Encoding:8bit\n\n" . $emailText . "\n\n"; 

		$corps_message .= "--{$mime_boundary}\n";

		$corps_message .= "Content-Type: application/octet-stream; name=\"".$mon_fichier."\"\n" . "Content-Description: imagejpg\n" ."Content-Disposition: attachment;\n" . " filename=\"".$mon_fichier."\"; size=".$_FILES['file']['size'].";\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		   
		$corps_message .= "--{$mime_boundary}--";
		$returnpath = "-f" . $emailTo;

		//send email
			mail($emailTo. ',' .$_POST["email"], $objet, $corps_message, $headers, $returnpath); 
			$firstname = $name = $email = $phone = $message = $objet = $file = "";
}

		

// --------------------------------------------------------------------


function isPhone($var){

	return preg_match("/^[0-9 ]*$/", $var);

}
function isEmail($var){
return filter_var($var, FILTER_VALIDATE_EMAIL);
// fonction native qui verifie si l'email est valide
}

function verifyInput($var){

	$var = trim($var);
	$var = stripslashes($var);
	$var = htmlspecialchars($var);
	return $var;

}


?>

<!-- formulaire -->
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">	

</head>
<body>
	<h1 class="typewriter">Formulaire de contact</h1>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

		<label>Nom : <span class="blue">*</span></label>
		<input id="name" type="text" name="name">
		<p class="comments"><?php echo $nameError; ?></p>

		<br>

		<label>Prénom : <span class="blue">*</span></label>
		<input id="firstname" type="text" name="firstname">
		<p class="comments"><?php echo $firstnameError; ?></p>

		<br>

		<label>Mail : <span class="blue">*</span></label>
		<input id="mail" type="mail" name="email">

		<p class="comments"><?php echo $emailError;?></p>

		<br>

		<label>Tél : <span class="blue">*</span></label>
		<input id="phone" type="tel" name="phone">

		<p class="comments"><?php echo $phoneError; ?></p>

		<br>

		<div id="email">
			<label>Objet : <span class="blue">*</span> </label>
			<input id="objet" type="text" name="objet">
			<p class="comments"><?php echo $objetError; ?></p>
			

			<label>Pièce jointe : </label>
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
			<input type="file" name="file">

			<p class="comments"><?php echo $fileError; ?></p>

			
			<label>Votre message : <span class="blue">*</span></label><br>
			<textarea id="message" name="message"></textarea>

			<p class="comments"><?php echo $messageError; ?></p>
		</div>

		<p class="requises"><span class="blue">* Ces informations sont requises</span></p>

		<br>

		<input id="bouton" type="submit" name="valider" value="Envoyer">
		<p class="thanks" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>">Votre message a bien été envoyé!</p>
	</form>

</body>
</html>