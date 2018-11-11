<?php

//require '../admin/database.php';
/**
 * Définis l'objet produit
 * produits proposés dans mon magasin Véto Boutique
 * attr (string) $_id
 * attr (string) $_description
 * attr (string) $_img
 * attr (string) $_prix
 * attr (int) $_stock
 * attr (string) $_categorie
 */
class Produit
{
	//attributs
	private $_id, $_produit, $_description, $_image, $_prix, $_stock, $_categorie;

	//constructeur
	function __construct($id,$produit, $categorie, $desc, $img, $prix,$stock)
	{
		# code...
		$this->_id = $id;
		$this->_produit = $produit;
		$this->_description = $desc;
		$this->_image = $img;
		$this->_prix = $prix;
		$this->_stock = $stock;
		$this->_categorie = $categorie;
	}

	// accesseur
	public function __get($attr){
		return $this->$attr;
	}

	// mutateur
	public function __set($val, $attr){
		$this->$attr = $val;
	}

	//fonction getAll
	// permet de récupérer la liste de tous les produits dans la base ! 
	public static function getAll(){
		$db = Database::connect();
		$sql = "SELECT * FROM `produits`";
		$statement = $db->query($sql);
		

		while($item = $statement->fetch()){
                    
                    echo '<tr class="bg-dark">';
                        echo '<td>' . $item['nom_produit']. '</td>';
                        echo '<td>' . $item['categorie']. '</td>';
                        echo '<td>' . $item['descr_produit']. '</td>';
                        echo '<td>' . number_format((float)$item['prix'],2, '.', '') . ' </td>';
                        echo '<td>' . $item['stock']. '</td>';
                        echo '<td width=350>';
                        echo '<a class="btn btn-secondary mr-2" href="view.php?id=' .$item['id'] . '"><i class="far fa-eye"></i> Voir</a>';
                        echo ' ';
                        echo '<a class="btn btn-primary mr-2" href="update.php?id=' . $item['id'] . '"><i class="fas fa-pencil-alt"></i> Modifier</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '"><i class="fas fa-trash-alt"></i> Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';


                    }

		Database::disconnect();
		return $item;
	}
//  fonction qui permet de récuperer les produits par catégorie(alimentation, jouet, médicament) par une requete a la db
	public function getProduitByCategory($categorie){
		$db = Database::connect();
		$sql = "SELECT * FROM `produits` WHERE `categorie` = '$categorie'";
		$statement = $db->query($sql);
		while($item = $statement->fetch()){
                    echo '<div class="col-sm-8 col-md-4 mb-5">
                                <div class="card pt-3 border border-success" style="width: 18rem; height:35rem;">
                                    <img class="card-img-top pb-2 border-bottom" style="height:15rem;" src="images/' . $item['image'] . '" alt="..."/>
                                  <div class="card-body text-center">
                                  	<h5 class="card-title" style="color:black;">' . $item['nom_produit'] .'</h5>
                                 	<p class="card-text" style="color:black;">' . $item['descr_produit'] .'</p>
                                    <p class="card-text" style="color:black;">' . $item['prix'] . ' €</p>
                                    <p class="card-text" style="color:black;"><strong>Quantité en stock: </strong>' . $item['stock'] . ' </p></div>
                                    <div class="card-footer text-center" style="height:4rem;">
                                    <a href="#" class="btn btn-order bg-success text-light" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a></div>
                                   
                                </div>
                           </div>';
                    
                    }

		Database::disconnect();
		return $item;
	}

	public static function createProduit($nom_produit,$categorie,$description,$img,$prix,$stock){
		$db = Database::connect();

		$statement = $db->prepare("INSERT INTO produits (nom_produit,categorie,descr_produit,image,prix,stock) values (?,?,?,?,?,?)");
		$statement->execute(array($nom_produit,$categorie,$description,$img,$prix,$stock));
	  //   echo "<pre>";
 		// $statement->debugDumpParams();
 		// echo "</pre>";

 		Database::disconnect();	        
	    header('Location:index.php?insert=success');	

	}

// methode qui permet de voir le détail du produit sélectionné dans l'index.php (dans admin)
	public function readProduit(){

		$db = Database::connect();

		if(!empty($_GET['id'])){
    
    		$id = ($_GET['id']);

		} 	

		 	$statement = $db->prepare('SELECT * FROM produits WHERE id = ?');
		 	$statement->execute(array($id));
		 	
		 	while($item = $statement->fetch()){

		 		echo '<div class="container admin bg-dark py-3 px-3" style="color:#fff; margin-top:10rem;">
            			<div class="row">
                			<div class="col-sm-6">
                    			<h1><strong>Voir un produit</strong></h1>
			                    <br>
			                   	<form>
                        			<div class="form-group">
                            			<label><strong>Nom: </strong>' . $item['nom_produit'] . '</label>
                            		</div>
                       				<div class="form-group">
                            			<label><strong>Catégorie: </strong>' . $item['categorie']. '</label>
                                    </div>
                        			<div class="form-group">
                            			<label><strong>Prix: </strong>' . number_format((float)$item['prix'],2, '.', '') .' €</label>
                                    </div>
                        			<div class="form-group">
                            			<label><strong>Description: </strong>' . $item['descr_produit'] . '</label>
                            		</div>
                        			<div class="form-group">
                            			<label><strong>Image: </strong>' . $item['image'] .'</label>
                                    </div>
                                </form>
                    			<br>
                    			<div class="form-actions">
                        			<a class="btn btn-primary" href="index.php"><i class="fas fa-arrow-left"></i> Retour</a>
                    			</div>
                			</div>
                			<div class="col-sm-6 site">
                    			
                        			<img src="../images/' . $item['image'] . '"alt=" produit" style="width:70%;">
                        		        
                            		<h4 class="mt-3">' . $item['nom_produit']. '</h4>                   
                            				                          				
                           			
                    			
                			</div>
           				</div>
        			</div>';
        		}


		 
		 Database::disconnect();
		 return $item;

	}
	//methode qui permet de modifier un produit

	public function updateProduit($produit,$categorie,$description,$img,$prix,$stock,$id){
		

		$db = Database::connect();

		$statement = $db->prepare("UPDATE produits SET nom_produit = ?, categorie = ?, descr_produit = ?, image = ?, prix = ?, stock = ? WHERE id = ?");
        $statement->execute(array($this->_produit,$this->_categorie,$this->_description,$this->_image,$this->_prix,$this->_stock,$this->_id));
        //debug
		 //  echo "<pre>";
		  //$statement->debugDumpParams();
		 // echo "</pre>";
    
        
		
		header("Location: index.php?update=success");	

		 	
     }       		

	public static function deleteProduit(){

		$db = Database::connect();

		$_SESSION['nom_produit'] = $produit;
		$_SESSION['categorie'] = $categorie;
		$_SESSION['prix'] = $prix;
		$_SESSION['descr_produit'] = $description;
		$_SESSION['stock'] = $stock;
		$_SESSION['id'] = $id;
		$_SESSION['image'] = $img;

		if(!empty($_POST['id']))
    	{
	        $id = $_POST['id'];
	        $db = Database::connect();
	        $statement = $db->prepare("DELETE FROM produits WHERE id = ?");
	        $statement->execute(array($id));
	        Database::disconnect();	        
	        header('Location:index.php?delete=success');
	        
   		}
		
	}
	
}

 
    