<?php require 'connexion.php'; 
session_start(); // à mettre dans toutes les pages de l'admin

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
if(isset($_POST['titre'])){ //si on a reçu une nouvelle formation
        if($_POST['titre']!='' && $_POST['sous_titre'] !='' && $_POST['dates']!='' && $_POST['description']!='' ){

            $formation = addslashes($_POST['titre']);
            $sous_titre = addslashes($_POST['sous_titre']);
            $dates = addslashes($_POST['dates']);
            $description = addslashes($_POST['description']);

            $pdoCV->exec(" INSERT INTO t_formations VALUES (NULL, '$formation', '$sous_titre ', '$dates', '$description', '1')");

            header("location: ../admin/formations.php");
            exit();

        } // ferme le if n'est pas vide 
    } //ferme le if isset

$order= '';
if(isset($_GET['order']) && isset($_GET['column'])){

    if($_GET['column'] == 'formation'){$order = ' ORDER BY formation';}
    elseif($_GET['column'] == 'sous_titre'){$order = ' ORDER BY sous_titre';}
    elseif($_GET['column'] == 'dates'){$order = ' ORDER BY dates';}
    elseif($_GET['column'] == 'description'){$order = ' ORDER BY description';}
    if($_GET['order'] == 'asc'){$order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
}

// suppression d'un élément de la BDD
if(isset($_GET['id_formation'])) { // on récupère le competence dans l'url par son id
    $efface = $_GET['id_formation']; // je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_formations WHERE id_formation = '$efface' "; // delete de la base
    $pdoCV->query($sql); // on peut le faire avec exec également

    header("location: ../admin/formations.php");

    } // ferme le if isset pour la suppression
 
        //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
          $sql = $pdoCV->prepare("SELECT * FROM t_formations WHERE id_utilisateur = '$id_utilisateur' $order");
          $sql->execute();
          $nbr_formations = $sql->rowCount();  
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- lien fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- lien boostrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin : les formations</title>
    <script src="ckeditor/ckeditor.js"></script>

</head>
<body>
<div class="container-fluid">
<?php require 'navigation.php'; ?>
   
    <h1 class="text-center mt-4">Mes formations</h1>
 <div class="tableau col-9 mx-auto">
        <table border="1" class="table text-center">
        <caption>La liste des formations : <?php echo $nbr_formations; ?></caption>
        <thead class="thead-dark">
            <tr>
                <th>formation <a href="formations.php?column=titre&order=asc"> <i class="fas fa-arrow-circle-down"></i></a> | <a href="formations.php?column=titre&order=desc"><i class="fas fa-arrow-circle-up"></i></a></th>
                <th>sous-titre <a href="formations.php?column=sous_titre&order=asc"><i class="fas fa-arrow-circle-down"></i></a> | <a href="formations.php?column=sous_titre&order=desc"><i class="fas fa-arrow-circle-up"></i> </a></th>
                <th>dates <a href="formations.php?column=dates&order=asc"><i class="fas fa-arrow-circle-down"></i></a> | <a href="formations.php?column=dates&order=desc"><i class="fas fa-arrow-circle-up"></i> </a></th>
                <th>description <a href="formations.php?column=description&order=asc"><i class="fas fa-arrow-circle-down"></i></a>| <a href="formations.php?column=description&order=desc"><i class="fas fa-arrow-circle-up"></i> </a></th>
                <th>Modifier</th>
                <th>Suppression</th>
            </tr>
        </thead>
        <tbody>
        <?php while($ligne_formation=$sql->fetch()) 
        { //debut boucle while
        ?>
        
            <tr>
                <td><?php echo $ligne_formation['titre']; ?></td>
                <td><?php echo $ligne_formation['sous_titre']; ?></td>
                <td><?php echo $ligne_formation['dates']; ?></td>
                <td><?php echo $ligne_formation['description']; ?></td>
                <td><a style="color: blue" href="modif_formation.php?id_formation=<?php echo $ligne_formation['id_formation']; ?>"><i class="fas fa-edit"></i></a></td>
                <td><a  style="color: red" href="formations.php?id_formation=<?php echo $ligne_formation['id_formation']; ?>"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php
            } //fin boucle while
        ?>
    
        </tbody>
        </table>
 </div>

<hr>
    <h1 class="text-center mt-4">nouvelle formation</h1>
   <div class="mx-auto col-6 bg-dark text-white">
        <!-- insertion d'une nouvelle formation formulaire -->
        <form action="formations.php" method="post" class="px-4 py-3">
        <div class="form-row">
        <div class="form-group col-4">
            <label for="titre">Formation</label>
            <input type="text" name="titre" class="form-control" placeholder="Nouvelle formation" required>
        </div>
        
        <div class="form-group col-4">
            <label for="sous_titre">sous-titre</label>
            <input type="text" name="sous_titre" class="form-control" placeholder="Integrateur developpeur WEB" required>
        </div>

        <div class="form-group col-4">
            <label for="dates">Dates</label>
            <input type="text" name="dates" class="form-control" placeholder="Juin - Oct. 2018 ">  
        </div>
        
        <div class="form-group col">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" id="description" required></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
            </script>
        </div>
    
        <div class="">
           <button type="submit" class="btn btn-success">Insérer une formation</button>
        </div>
        </form>
        </div>
    </div>
    </div> <!-- fin container -->

    <!-- js pour les composants boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>