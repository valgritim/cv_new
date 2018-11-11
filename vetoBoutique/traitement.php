<?php

	session_start();
	require 'classes/Client.php';

	$last = $first = $email = $address = $pc = $city = $pwd = "";


	if(!empty($_POST)){

		$last = verifyInput($_POST['user_last']);
		$first = verifyInput($_POST['user_first']);
		$email = verifyInput($_POST['user_email']);
		$address = verifyInput($_POST['user_address']);
		$pc = verifyInput($_POST['user_pc']);
		$city = verifyInput($_POST['user_city']);
		$pwd = $_POST['user_pwd'];
		$dateCrea = date('Y-m-d H:i:s');
		

		// gestion des erreurs, verification des champs

		if(empty($last) || empty($first) || empty($email) || empty($address) || empty($pc) || empty($city) || empty($pwd)){

				$errors = "* Ces champs ne peuvent être vides, merci de les remplir avant de valider!";
				$_SESSION['errors'] = $errors;
				header("Location: register.php?register=empty");
				exit();

		} else {

				if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){

					$errors = "Caractères non valides";
					$_SESSION['errors'] = $errors;
					header("Location: register.php?register=invalidChar");
					exit();
				} else {

					if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

						$errors['email'] = "email non valide";
						header("Location: register.php?register=email");	

						exit();

					} else {

						require 'admin/database.php';
						

						$user = new Client($last,$first,$email,$address,$city,$pc,$dateCrea,$pwd);						
						$user->new();
					}
				}		
			}
	}

function verifyInput($var){

	$var = trim($var);
	$var = stripslashes($var);
	$var = htmlspecialchars($var);
	return $var;

}

?>



