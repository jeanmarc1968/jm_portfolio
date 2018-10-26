<?php require 'connexion.php'; 


// insertion
if(isset($_POST['nom'])){// si on a reçu un nouveau    
    if($_POST['nom'] !="" && $_POST['email'] != "" && $_POST['sujet'] != "" && $_POST['message'] != ""){        $nom = addslashes($_POST['nom']);
       $email = addslashes($_POST['email']);
       $sujet = addslashes($_POST['sujet']);
       $message = addslashes($_POST['message']);

       $pdoCV -> exec("INSERT INTO t_messages VALUES (NULL, '$nom', '$email', '$sujet', '$message')");        header("location: ../front/index.php");
       exit();    
    } // fin if !=""}// fin $_POST reception
} // ferme le if isset

    // pour trier les colonnes
    $order= '';
    if(isset($_GET['order']) && isset($_GET['column'])){
    
        if($_GET['column'] == 'email'){$order = ' ORDER BY email';}
        elseif($_GET['column'] == 'sujet'){$order = ' ORDER BY sujet';}
        elseif($_GET['column'] == 'message'){$order = ' ORDER BY message';}
        if($_GET['order'] == 'asc'){$order.= ' ASC';}
        elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
    }
// suppression d'un élément de la BDD
if(isset($_GET['id_message'])) { // on récupère le competence dans l'url par son id
    $efface = $_GET['id_message']; // je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_messages WHERE id_message = '$efface' "; // delete de la base
    $pdoCV->query($sql); // on peut le faire avec exec également

    header("location: ../admin/messages.php");

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
    <title>Contact</title>
</head>