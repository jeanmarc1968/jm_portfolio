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

//gestion mise à jour d'une information
if(isset($_POST['competence'])) {
    $competence = addslashes($_POST['competence']);
    $niveau = addslashes($_POST['niveau']);
    $categorie = addslashes($_POST['categorie']);
    
    $id_competence = $_POST['id_competence'];

    $pdoCV->exec(" UPDATE t_competences SET competence='$competence', niveau='$niveau', categorie='$categorie' WHERE id_competence='$id_competence' "); 
    header('location: ../admin/competences.php');
    exit();
}

// je récupère l'id de ce que je mets à jour
$id_competence = $_GET['id_competence']; //par son id et avec GET

$sql = $pdoCV->query("SELECT * FROM t_competences WHERE id_competence='$id_competence'");
$ligne_competence= $sql->fetch();
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
    <script src="ckeditor/ckeditor.js"></script>
<?php 
//requete pour une seule information
$sql = $pdoCV->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='$id_utilisateur'");
$ligne_utilisateur = $sql->fetch(); //va chercher 


?>
    <title>Admin : mise à jour compétence</title>
</head>
<body>
<?php require 'navigation.php'; ?>
    <h1 class="text-center mt-4">Mise à jour d'une compétence</h1>

     <!-- mise à jour formulaire -->
    <div class="col-3 bg-dark text-white m-auto card">
        <form action="modif_competence.php" method="post" class="px-4 py-3">
        <div class="form-row">
            <div class="form-group col-5">
                <label for="competence">Compétence</label>
                <input type="text" name="competence"  class="form-control" value="<?php echo $ligne_competence['competence']; ?>" required>
            </div>
    
            <div class="form-group col-2">
                <label for="niveau">Niveau</label>
                <input type="text" name="niveau" class=form-control value="<?php echo $ligne_competence['niveau']; ?>" required>
            </div>
    
            <div class="form-group col-5">
                <label for="categorie">Catégorie</label>
                <select name="categorie">
                    <option value="Développement"
                    <?php //pour ajouter selected="selected" à la balise option si c'est la cat. de la compétence
                            if(!(strcmp("Développement", $ligne_competence['categorie']))) { //strcmp compare deux chaînes de caractères
                                echo "selected=\"selected\"";
                            }
                        ?>>Developpement</option>              
                    <option value="Gestion de projet" class="form-control"
                    <?php 
                            if(!(strcmp("Gestion de projet", $ligne_competence['categorie']))) { 
                                echo "selected=\"selected\"";
                            }
                        ?>>Gestion de projet</option>
                    <option value="Integration" class="form-control"
                    <?php 
                            if(!(strcmp("Integration", $ligne_competence['categorie']))) { 
                                echo "selected=\"selected\"";
                            }
                        ?>>Integration</option>
                </select>
            </div>
            <div class="col-3 bg-dark text-white">
            <input type="hidden" name="id_competence" value="<?php echo $ligne_competence['id_competence']; ?>">
                <button type="submit" class="btn btn-success">mettre à jour</button>
            </div>
        </form>
        </div>                    
    </div> <!-- fin container -->
</body>
    <!-- js pour les composants boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>