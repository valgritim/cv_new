<?php

session_start();

require '../classes/Produit.php';


$error = "Les champs ne peuvent être vides";

if(!empty($_GET['id']))        
   	{

        $id = $_GET['id'];

   	}

$produit = $categorie = $prix = $descr_produit = $stock = $img = "";

if(!empty($_POST['submit'])){

	$produit = checkInput($_POST['nom_produit']);
	$categorie = checkInput($_POST['categorie']);
	$prix = checkInput($_POST['prix']);
	$description = checkInput($_POST['descr_produit']);
	$stock = checkInput($_POST['stock']);
	$id = $_POST['id'];
	$img = $_POST['image'];


						
	if(empty($produit) || empty($categorie) || empty($prix) || empty($description) || empty($stock)){
		$_SESSION['id'] = $id;
		$_SESSION['error'] = $error;
		header("Location: update.php?id=$id");            
	 	exit();
		
	} else {

		require 'database.php'; 
		$prod = new Produit($id,$produit,$categorie,$description,$img,$prix,$stock);	

		$prod->updateProduit($produit,$categorie,$description,$img,$prix,$stock,$id);
		
		
	}

}

function checkInput($data){
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
}

?>