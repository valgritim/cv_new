<?php
  // Definition des constantes et variables
  
  $errorMessage = $login = $password = "";
 
  // Test de l'envoi du formulaire
  if(!empty($_POST)) 

    {
    // Les identifiants sont transmis ?
    if(!empty($_POST['login']) && !empty($_POST['password'])) 
      
    {
      $login = strtolower($_POST['login']);
      $password = strtolower($_POST['password']);

      if($login !== "valerie") 
      {
        $errorMessage = 'Mauvais login !';
      }
        elseif($password !== "admin") 
      {  
        $errorMessage = 'Mauvais password !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['login'] = "valerie";
        // On redirige vers le fichier admin.php
        header('location: admin/index.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Golden Burger</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/admin.css">
    </head>

    <body>
        <div class="login-box">
            <img src="images/avatar.png" class="avatar">
            <h3>Login admin</h3>
            <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" role="form">
                <?php
                    // Rencontre-t-on une erreur ?
                    if(!empty($errorMessage)) 
                      {
                        echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
                      }
                ?>
                    <br>
                    <p>Nom administrateur</p>
                    <input type="text" id="name" name="login" placeholder="tapez valerie">

                    <p>Mot de passe</p>
                    <input type="password" id="password" name="password" placeholder="tapez admin">

                    <input class="btn" type="submit" name="submit" value="Valider">

            </form>
        </div>

    </body>

    </html>
