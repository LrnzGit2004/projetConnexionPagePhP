<?php 

//On demarre la session sur cette page
session_start();

$host = "localhost";
            $user = "root";
            $motDePasse = "";
            $Db_name = "Connexion";
            $link = mysqli_connect($host, $user, $motDePasse, $Db_name);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    //ensuite on affiche le contenu de la variable session

    echo " <p class ='ms' >la session de " .$_SESSION ['nom'] ." a bien été ouverte ! </p><br>";
    ?>
    <?php 
    echo " <p class ='message'>Bienvenu ." .$_SESSION ['email'];
    ?>
    
</body>
</html>