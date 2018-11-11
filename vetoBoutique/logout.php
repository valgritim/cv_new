<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destruction de session
header("Location:index.php?logout=success"); //redirection vers l'accueil
exit();
?>