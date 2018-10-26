<?php
    require 'admin/connexion.php';
    session_start(); // à mettre dans toutes les pages de l'admin

    // traitement pour la connexion
    if(isset($_POST['connexion'])){ // connexion est le name du button

        $email = addslashes($_POST['email']);
        $mdp = addslashes($_POST['mdp']);

        $sql = $pdoCV -> prepare("SELECT * FROM t_utilisateurs WHERE email = '$email' AND mdp = '$mdp'"); // on vérifie l'email ET le mdp
        $sql -> execute();
        $nbr_utilisateur = $sql -> rowCount(); // on compte si il est dans la BDD

        if($nbr_utilisateur == 0) { // 0 s'il n'y est pas et 1 s'il y est
            echo '<p>Erreur ! </p>';
        }else{
            //echo $nbr_utilisateur; // il y est ! 
            $ligne_utilisateur = $sql -> fetch();

            $_SESSION['connexion_admin'] = 'connecté'; // connexion pour l'admin

            $_SESSION['id_utilisateur'] = $ligne_utilisateur['id_utilisateur']; 
            $_SESSION['email'] = $ligne_utilisateur['email']; 
            $_SESSION['nom'] = $ligne_utilisateur['nom']; 
            $_SESSION['mdp'] = $ligne_utilisateur['mdp']; 

            //echo $ligne_utilisateur['nom'];
            header('location:admin/index.php');
            
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- balise pour le favicon -->
    <!-- <link rel="shortcut icon" href="/images/favicon.png"> -->
    <!-- lien cdn bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : authentification</title>
</head>
<body>
    
    <div class="col-lg-3 col-md-6 col-sm-12 bg-dark my-5 card text-white m-auto">
        <div class="card m-4 text-center text-dark"><h1>Admin authentification</h1></div>
        <form action="authentification.php" method="post" class="px-4 py-3">
    
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" placeholder="login@email.fr" required>
        </div>
        
        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" required>
        </div>
    
        <div><button name="connexion" type="submit" class="btn btn-primary">Se connecter</button></div>
    
        </form>
    </div>
    
</body>
</html>