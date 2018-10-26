<?php require '../admin/connexion.php';
session_start();
if(isset($_SESSION['connexion_admin'])) { // si on est connecté on récupère les variables de session

    $id_utilisateur=$_SESSION['id_utilisateur'];
    $email=$_SESSION['email'];
    $mdp=$_SESSION['mdp'];
    $nom=$_SESSION['nom'];

    //echo $id_utilisateur;
}else{ // si on n'est pas connecté on ne peut pas accèder à l'admin
    header('location:../authentification.php');
}

//requete pour une seule information
$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur' ");
$ligne_utilisateur = $sql -> fetch();

//pour vider les variables de session on destroy ! 
if(isset($_GET['quitter'])){ //on récupère le terme quitter en GET

    $_SESSION['connexion_admin']='';
    $_SESSION['id_utilisateur']='';
    $_SESSION['email']='';
    $_SESSION['nom']='';
    $_SESSION['mdp']='';

        unset($_SESSION['connexion_admin']); //unset détruit la variable connexion_admin
        session_destroy(); //on détruit la session

        header('location:../authentification.php');
}

//requete pour une seule information
$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur' ");
$ligne_utilisateur = $sql -> fetch();

// insertion d'un élément dans la base
if(isset($_POST['loisir'])){ //si on a reçu un nouveau loisir
        if($_POST['loisir']!=''){

            $loisir = addslashes($_POST['loisir']);

            $pdoCV->exec(" INSERT INTO t_loisirs VALUES (NULL, '$loisir', '$id_utilisateur')");

            header("location: ../admin/loisirs.php");
            exit();

        } // ferme le if n'est pas vide 
    } //ferme le if isset

//pour trier les colonnes
$order= '';
if(isset($_GET['order']) && isset($_GET['column'])){

    if($_GET['column'] == 'loisir'){$order = ' ORDER BY loisir';}
    if($_GET['order'] == 'asc'){$order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
}
// suppression d'un élément de la BDD
if(isset($_GET['id_loisir'])) { // on récupère le competence dans l'url par son id
    $efface = $_GET['id_loisir']; // je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_loisirs WHERE id_loisir = '$efface' "; // delete de la base
    $pdoCV->query($sql); // on peut le faire avec exec également

    header("location: ../admin/loisirs.php");

    } // ferme le if isset pour la suppression
    ?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- lien boostrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin : les loisirs</title>
    <script src="ckeditor/ckeditor.js"></script>
    
</head>
<body>
<div class="container-fluid">
<?php require 'navigation.php'; ?>
    <?php
        //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
          $sql = $pdoCV->prepare(" SELECT * FROM t_loisirs WHERE id_utilisateur='$id_utilisateur'");
          $sql->execute();
          $nbr_loisirs = $sql->rowCount();
    ?>
    <h1 class="text-center mt-4">Mes loisirs</h1>
    <div class="tableau col-6 mx-auto">
        <table border="1" class="table text-center">
        <caption>La liste des loisirs : <?php echo $nbr_loisirs; ?></caption>
        <thead class="thead-dark">
            <tr>
                <th>Loisirs<a href="loisirs.php?column=loisir&order=asc"><i class="fas fa-arrow-circle-down"></i></a>| <a href="loisirs.php?column=loisir&order=desc"><i class="fas fa-arrow-circle-up"></i></a></th>
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
        </thead>
<tbody>
    <?php while($ligne_loisir=$sql->fetch()) 
    { //debut boucle while
    ?>
        <tr>
            <td><?php echo $ligne_loisir['loisir']; ?></td>
            <td><a style="color: blue" href="modif_loisir.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?>"><i class="fas fa-edit"></i></a></td>
            <td><a style="color: red" href="loisirs.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?>"><i class="fas fa-trash-alt"></a></td>
        </tr>
    <?php
        } //fin boucle while
    ?>

    </tbody>
    </table>
    </div>
    <hr>
    <!-- formulaire nouveau loisir -->
    <h1 class="text-center mt-4">nouveau loisir</h1>
    <div class="col-3 bg-dark text-white mx-auto">
        <!-- insertion d'une nouvelle formation formulaire -->
        <form action="loisirs.php" method="post">
        <div class="px-4 py-3">
            <label for="titre">Loisir</label>
            <input type="text" name="titre" class="form-control" placeholder="Nouveau loisir" required>
        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
        </script>
        </div>
    
        <div class="">
           <button type="submit" class="btn btn-success">Insérer un loisir</button>
        </div>
        </form>
    </div>
    </div> <!-- fin container -->
    <!-- js pour les composants boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>