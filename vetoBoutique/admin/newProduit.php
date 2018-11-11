<?php

session_start();
require '../classes/Produit.php';

$nom_produit = $categorie = $img = $prix = $description = $stock = "";
$error = " Ces champs ne peuvent être vides";
$imageError = " Les fichiers autorises sont .jpg .png .jpeg et .gif";
$existError = " Le fichier existe déjà";
$weightError = " Le fichier ne doit pas dépasser les 500KB";
$uploadError = " Il y a eu une erreur lors du chargement";

if(!empty($_POST)){

	$nom_produit = checkInput($_POST['nom_produit']);
	$categorie = checkInput($_POST['categorie']);
	$image = checkInput($_FILES['img']['name']);
    $imagePath = '../images/' . basename($image);
    $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
	$prix = checkInput($_POST['prix']);
	$description = checkInput($_POST['descr_produit']);
	$stock = checkInput($_POST['stock']);
	$isSuccess = true;
    $isUploadSuccess = false;

    if(empty($nom_produit) || empty($categorie) || empty($prix) || empty($description) || empty($stock) || empty($image)){

			$_SESSION['error'] = $error;
			$isSuccess = false;
			exit();
			header('Location:insert.php?fields=empty');

		} else {

			$isUploadSuccess = true;
	        if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif")
	        {
	            $_SESSION['error'] = $imageError;
	            $isUploadSuccess = false;
	            header('Location:insert.php?extension=false');
	        }
	        if(file_exists($imagePath))
	        {
	        	$_SESSION['error'] = $existError;	            
	            $isUploadSuccess = false;
	            header('Location:insert.php?file=alreadyExist');
	        }
	        if($_FILES["img"]["size"] > 2000000)
	        {
	        	$_SESSION['error'] = $weightError;
	            $isUploadSuccess = false;
	            header('Location:insert.php?file=weightError');
	        }
	        if($isUploadSuccess)
	        {
	            if(!move_uploaded_file($_FILES["img"]["tmp_name"], $imagePath))
	            {	

	            	$_SESSION['error'] = $_FILES["img"]["tmp_name"];	                
	                $isUploadSuccess = false;
	                header('Location:insert.php?file=uploadError');
	            }
        	}

		$isSuccess = true;
		
	}

	if($isSuccess && $isUploadSuccess)
    {
        require 'database.php'; 

		Produit::createProduit($nom_produit,$categorie,$description,$image,$prix,$stock);
    }
}

function checkInput($data){
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
}
        
?>