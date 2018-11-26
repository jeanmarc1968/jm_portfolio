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




// insertion d'un élément dans la base
if(isset($_POST['competence'])){ //si on a reçu un nouveau competence
        if($_POST['competence']!='' && $_POST['niveau'] !='' && $_POST['categorie']!='' ){

            $competence = addslashes($_POST['competence']);
            $niveau = addslashes($_POST['niveau']);
            $categorie = addslashes($_POST['categorie']);

            $pdoCV->exec(" INSERT INTO t_competences VALUES (NULL, '$competence', '$niveau', '$categorie', '$id_utilisateur')");

            header("location: ../admin/competences.php");
            exit();

        } // ferme le if n'est pas vide 
    } //ferme le if isset



    // pour trier les colonnes
$order= '';
if(isset($_GET['order']) && isset($_GET['column'])){

    if($_GET['column'] == 'competence'){$order = ' ORDER BY competence';}
    elseif($_GET['column'] == 'niveau'){$order = ' ORDER BY niveau';}
    elseif($_GET['column'] == 'categorie'){$order = ' ORDER BY categorie';}
    if($_GET['order'] == 'asc'){$order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
}

// suppression d'un élément de la BDD
if(isset($_GET['id_competence'])) { // on récupère le competence dans l'url par son id
    $efface = $_GET['id_competence']; // je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_competences WHERE id_competence = '$efface' "; // delete de la base
    $pdoCV->query($sql); // on peut le faire avec exec également

    header("location: ../admin/competences.php");

    } // ferme le if isset pour la suppression
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
    <script src="ckeditor/ckeditor.js"></script>
    <title>Admin : les compétences</title>
</head>
<body>
<div class="container-fluid">
<?php require 'navigation.php'; ?>
    <?php
        //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
          $sql = $pdoCV->prepare(" SELECT * FROM t_competences WHERE id_utilisateur = '$id_utilisateur' $order ");
          $sql->execute();
          $nbr_competences = $sql->rowCount();  
    ?>
<h1 class="text-center mt-4">Mes compétences</h1>
 <div class="tableau table-center text-center col-6 mx-auto">
        <table border="1" class="table table-striped table-hover" >
        <caption>La liste des compétences : <?php echo $nbr_competences; ?></caption>
        <thead class="thead-dark">
            <tr>
                <th>Compétences <a href="competences.php?column=competence&order=asc"><i class="fas fa-arrow-circle-down"></i></a>| <a href="competences.php?column=competence&order=desc"><i class="fas fa-arrow-circle-up"></i></a></th>
                <th>Niveau <a href="competences.php?column=niveau&order=asc"><i class="fas fa-arrow-circle-down"></i></a> | <a href="competences.php?column=niveau&order=desc"><i class="fas fa-arrow-circle-up"></i></a></th>
                <th>Catégorie <a href="competences.php?column=categorie&order=asc"><i class="fas fa-arrow-circle-down"></i></a> | <a href="competences.php?column=categorie&order=desc"><i class="fas fa-arrow-circle-up"></i></a></th>
                <th>Modifier</th>
                <th>Suppression</th>
            </tr>
        </thead>
        <tbody>
        <?php while($ligne_competence=$sql->fetch()) 
        { //debut boucle while
        ?>   
            <tr>
                <td><?php echo $ligne_competence['competence']; ?></td>
                <td><?php echo $ligne_competence['niveau']; ?></td>
                <td><?php echo $ligne_competence['categorie']; ?></td>
                <td><a style="color: blue" href="modif_competence.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>"><i class="fas fa-edit"></i></a></td>
                <td><a style="color: red" href="competences.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php
            } //fin boucle while
        ?>
        </tbody>
        </table>
 </div>
<hr>
<h1 class="text-center mt-4">Formulaire d'insertion d'une compétence</h1>
   <div class="col-4 bg-dark text-white m-auto card">
        <!-- insertion d'une nouvelle compétence formulaire -->
        <form action="competences.php" method="post" class="p-2">
        <div class="form-row">
        <div class="form-group col-xl-4 col-md-12">
            <label for="competence">Compétence</label>
            <input type="text" name="competence" class="form-control" placeholder="Nouvelle compétence" required>
        </div>
        
        <div class="form-group col-xl-4 col-md-6">
            <label for="niveau">Niveau</label>
            <input type="text" name="niveau" class="form-control" placeholder="niveau en chiffre" required>
        </div>
    
        <div class="form-group col-xl-4 col-md-6">
            <label for="categorie">Catégorie</label>
            <select name="categorie" class="custom-select">
                    <option value="Développement">Développement</option>
                    <option value="Intégration">Intégration</option>
                    <option value="Gestion de projet">Gestion de projet</option>
            </select>
        </div>
        </div>

        <div class="form-row">
            <div class="form-group col-xl-12 col-md-12 col-sm-12 text-center">
           <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i>- Insérer une compétence</button>
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