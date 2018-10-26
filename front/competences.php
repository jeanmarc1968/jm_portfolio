<?php require '../admin/connexion.php';




    // pour trier les colonnes
$order= '';
if(isset($_GET['order']) && isset($_GET['column'])){

    if($_GET['column'] == 'competence'){$order = ' ORDER BY competence';}
    elseif($_GET['column'] == 'niveau'){$order = ' ORDER BY niveau';}
    elseif($_GET['column'] == 'categorie'){$order = ' ORDER BY categorie';}
    if($_GET['order'] == 'asc'){$order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
}
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
          $sql = $pdoCV->prepare(" SELECT * FROM t_competences");
          $sql->execute();
          $nbr_competences = $sql->rowCount();  
    ?>
<h1 class="text-center mt-4">Mes compétences</h1>
 <div class="tableau table-center text-center col-9 mx-auto">
        <table border="1" class="table text-center" >
        <caption>La liste des compétences : <?php echo $nbr_competences; ?></caption>
        <thead class="thead-dark">
            <tr>
                <th>Compétences <a href="competences.php?column=competence&order=asc"><i class="fas fa-arrow-circle-down"></i></a>| <a href="competences.php?column=competence&order=desc"><i class="fas fa-arrow-circle-up"></i> </a></th>
                <th>Niveau <a href="competences.php?column=niveau&order=asc"><i class="fas fa-arrow-circle-down"></i></a> | <a href="competences.php?column=niveau&order=desc"><i class="fas fa-arrow-circle-up"></i></a></th>
                <th>Catégorie <a href="competences.php?column=categorie&order=asc"><i class="fas fa-arrow-circle-down"></i> </a> | <a href="competences.php?column=categorie&order=desc"><i class="fas fa-arrow-circle-up"></i></a></th>
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
            </tr>
        <?php
            } //fin boucle while
        ?>
        </tbody>
        </table>
 </div>
<hr>

   </div> <!-- fin container -->
    <!-- js pour les composants boostrap -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>