<?php 

//demaarage de la session
    session_start();

    if(isset($_POST['valider'])){ //si on clique sur "valider", alors :
        // verifions les informations du formulaire
        if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mdp'])){ //on verifie ici si l'utilisateur a bien rempli tous les champs
            //declarations email nom et mot de passe das des variables

            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $error ="";

            //verifier maintenant si les infos entrées sont correctes
            //connection à la base de données
            $host = "localhost";
            $user = "root";
            $motDePasse = "";
            $Db_name = "Connexion";
            $link = mysqli_connect($host, $user, $motDePasse, $Db_name);

            //ecrivons une requetes pour sélectionner les utilisateurs
            $query = mysqli_query($link, "SELECT * FROM utilisateur WHERE nom='$nom' AND email='$email' AND motdepasse='$mdp' ");
            $numero_ligne = mysqli_num_rows( $query); //compter le nombre de lignes ayant rapport avec la requette sql
             
            if($numero_ligne > 0 ){
                header("location:bienvenu.php"); //si le nombre de lignes est > 0 on se redirige vers la page de bienvenu
               
                //nous allons creer une variable de type session pour contenir l'email et une autre pour contenir le nom de l'utilisateur
                $_SESSION ['nom'] = $nom;
                $_SESSION ['email'] = $email;
            }else {
                $error = "Une de vos informations n'est pas correcte !";
                
            }
        }

    }

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <h1>Connexion</h1>
        <?php 
        if(isset($error)){ //si on a une erreure, on l'affiche ici
            echo "<p class= 'error'>".$error."</p>";
        }
        
        ?>
        <form action="" method="POST"> 
            <!-- Vu qu'on veut envoyer les donnée sur la mm page, on ne met plus rien au niveau de "action" -->
           <input type="text" name="nom" placeholder="Votre Nom" required>
           <input type="text" name="email" placeholder="Votre Adresse Mail" required>
           <input type="password" name="mdp" placeholder="Votre Mot de Passe" required>
           <input type="submit"  value="Se Connecter" name="valider">
        </form>
</section>
</body>
</html>