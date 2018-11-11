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
 <!--  Body---------------------- -->

 <form class="form col-md-8 col-lg-12" action="newProduit.php" method="post" role="form" enctype="multipart/form-data">   
  <div class="container admin bg-dark mb-5 py-3 px-3" style="color:#fff; margin-top:10rem;">
    <div class="row">
        <div class="col-sm-10 col-md-8 offset-1 col-lg-10 offset-1">
            <h1><strong>Enregistrer un nouveau produit <i class="fas fa-door-open"></i></strong></h1>
            <br>
            <div class="bg bg-danger text-center inline-block">
                <?php
                if(isset($_SESSION["error"])){
                  $error = $_SESSION["error"];
                  echo $error; }               
                  ?> 
              </div>
              <form>
                <div class="form-group">
                   <label class="text-primary"><strong>Nom: </strong></label>
                   <input type="text" class="form-control" id="nom" name="nom_produit" placeholder="nom produit">
               </div>
               <div class="form-group">
                <label class="text-primary"><strong>Catégorie: </strong></label>
                <input type="text" class="form-control" id="nom" name="categorie" placeholder="catégorie">
            </div>
            <div class="form-group">
                <label class="text-primary"><strong>Prix €: </strong></label>
                <input type="text" class="form-control" id="nom" name="prix" placeholder="prix">
            </div>
            <div class="form-group">
                <label class="text-primary"><strong>Description: </strong></label>
                <input type="text" class="form-control" id="nom" name="descr_produit" placeholder="description">
            </div>
            <div class="form-group">
                <label class="text-primary"><strong>Quantité en stock: </strong></label>
                <input type="text" class="form-control" id="stock" name="stock" placeholder="stock">
            </div>
            <div class="form-group">
               <label for ="image"class="text-primary"><strong>Télécharger une image: </strong></label>
               <input type="file" class="form-control" id="img" name="img" placeholder="image">
           </div>	
           <br>
           <div class="form-actions">
              <input class="btn btn-success mr-2" type="submit" name="submit" value="Valider" disabled>
              <a class="btn btn-primary" href="index.php"><i class="fas fa-arrow-left"></i> Retour</a>
          </div>
          
      </form>

  </div>
  
</div>
</div>
</form>
</body>
</html>
<?php
session_unset();

?>