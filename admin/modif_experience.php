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
$sql = $pdoCV -> query("SELECT * FROM t_experiences WHERE id_experience = '$id_utilisateur' ");
$ligne_experience = $sql -> fetch();

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
if(isset($_POST['titre'])) {
    $titre = addslashes($_POST['titre']);
    $dates = addslashes($_POST['dates']);
    $sous_titre = addslashes($_POST['stitre']);
    $description = addslashes($_POST['description']);
    $id_experience = $_POST['id_experience'];

    $pdoCV->exec(" UPDATE t_experiences SET titre='$titre', dates='$dates',stitre='$sous_titre', description='$description'  WHERE id_experience='$id_experience' "); 
    header('location: ../admin/experiences.php');
    exit();
}

// je récupère l'id de ce que je mets à jour
$id_experience = $_GET['id_experience']; //par son id et avec GET

$sql = $pdoCV->query("SELECT * FROM t_experiences WHERE id_experience='$id_experience'");
$ligne_experience= $sql->fetch();
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
$ligne_utilisateur= $sql->fetch(); //va chercher
?>
    <title>Admin : mise à jour expérience</title>
</head>
<body>
<?php require 'navigation.php'; ?>
    <h1 class="text-center mt-4">Mise à jour d'une expérience</h1>
    <div class="col-4 bg-dark text-white m-auto card">
         <!-- mise à jour formulaire -->
         <div class="form-row">
        <form action="modif_experience.php" method="post" class="px-4 py-3">
        <div class="form-row">
            <div class="form-group col-xl-4 col-md-12">
                <label for="titre">Titre Expériences</label>
                <input type="text" name="titre" class="form-control" value="<?php echo $ligne_experience['titre']; ?>" required>
            </div>

          <div class="form-group col-xl-4 col-md-6">
            <label for="stitre">Sous-titre</label>
            <input type="text" name="stitre" class="form-control" value="<?php echo $ligne_experience['stitre']; ?>" required>  
        </div>
   
        <div class="form-group col-xl-4 col-md-6">
            <label for="dates">Dates</label>
            <input type="text" name="dates" class="form-control" value="<?php echo $ligne_experience['dates']; ?>" required>  
        </div>
        
        <div class="form-row">
        <div class="form-group col-xl-12 col-md-12">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" required><?php echo $ligne_experience['description']; ?></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
            </script>
        </div>
        </div>

            <div class="form-row">
            <div class="form-group col-xl-12 col-md-12 col-sm-12 text-center">
            <input type="hidden" name="id_experience" value="<?php echo $ligne_experience['id_experience']; ?>">
                <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> -mettre à jour</button>
            </div>
            </div>
        </form>
        </div>
    
</body>
    <!-- js pour les composants boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</html>