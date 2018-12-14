<?php require 'admin/connexion.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
      //requête pour une seule info
      $sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1' ");
      $ligne_utilisateur = $sql->fetch();
      
       
?>



<title><?php echo $ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']; ?> - UX Designer & Front End Developer</title>
<meta name="description" content="Jean-Marc Bon">
<meta name="author" content="Jean-Marc Bon">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Styles
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/styleFront.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="container">
      <div class="row">
        <div class="intro-text">
          <h1>Bonjour, je suis Bon <br> <span class="name"><?php echo $ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']; ?> </span></h1>
          <p>Intégrateur Développeur Web</p>
          <a href="#about" class="btn btn-default btn-lg page-scroll">Plus d'infos</a> </div>
      </div>
    </div>
  </div>
</header>

<!-- Navigation -->
<div id="nav"><!-- début #nav -->
  <nav class="navbar navbar-custom"><!-- début nav -->
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
        <a class="navbar-brand page-scroll" href="#page-top"><?php echo $ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']; ?></a> </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
          <li class="hidden"> <a href="#page-top"></a> </li>
          <li> <a class="page-scroll" href="#"></a> </li>
          <li> <a class="page-scroll" href="#skills">Compétences</a> </li>
          <li> <a class="page-scroll" href="#portfolio">Portfolio</a> </li>
          <li> <a class="page-scroll" href="#resume">Expériences</a> </li>
          <li> <a class="page-scroll" href="#contact">Contact</a> </li>
          <!-- <li> <a class="page-scroll" href="#CV">CV</a> </li> -->
        </ul>
      </div>
    </div>
  </nav><!-- fin nav -->
</div><!-- fin #nav -->


<!-- Section  A propos -->
<div id="about"><!-- début -->
    <div class="container"><!-- début .container -->
        <div class="section-title text-center center">
          <h2>A propos de moi</h2>
          <hr>
        </div>


        <div class="row"><!-- début .row -->
              <div class="col-md-12 text-center"><img src="img/man1.jpg" class="img-responsive"></div>
            <div class="col-md-8 col-md-offset-2"><!-- début .col-md-8 col-md-offset-2 -->
                <div class="about-text">
                    <p>J'ai intégré la formation Intégrateur Déveveloppeur Web d'une période de 10 mois, au sein du PoleS. Celle-ci m'a permis de découvrir et acquérir des connaissances dans les différents langages pour la conception de site.</p>  
                    <p></p>
                    <p class="text-center"><a class="btn btn-primary" href="img/portfolio/CV2.pdf"><i class="fa fa-download"></i> Téléchargez mon CV</a></p>   
                </div>
            </div><!-- fin .col-md-8 col-md-offset-2 -->
        </div><!-- fin .row -->
    </div><!-- fin .container -->
</div><!-- fin #about -->
<!-- Fin Section a propos -->


<!-- Skills Section -->
<div id="skills" class="text-center">
    <div class="container"><!-- début .container -->
        <div class="section-title center">
          <h2>Compétences</h2>
          <hr>
        </div>

        <div class="row"><!-- début .row --> 
        <?php  // requetes pour chercher compétences
      $sql = $pdoCV -> prepare("SELECT * FROM t_competences WHERE id_utilisateur = 1 ORDER BY competence ASC");
      $sql->execute();
      $nbr_competences = $sql->rowCount();
      ?>
            <!-- <div class="col-md-4 col-sm-6 skill"> <span class="chart" data-percent="95"> <span class="percent">95</span> </span>
              <h4>HTML5</h4>
            </div> -->
            <?php 
                while($ligne_competence = $sql -> fetch()) // début de la boucle while
                {
            ?>

          <div class="col-md-4 col-sm-6 skill"> <span class="chart" data-percent="<?php echo $ligne_competence['niveau']; ?>"> <span class="percent"><?php echo $ligne_competence['niveau']; ?></span></span>
              <h4><?php echo $ligne_competence['competence']; ?></h4>
          </div>
              <?php
                  } ?> <!-- fin de boucle while -->

        </div><!-- fin .row -->
    </div><!-- fin .container -->
</div> 
<!-- Fin Skills Section -->



<!-- Section Portfolio  -->
<div id="portfolio">
  <div class="container">
    <div class="section-title text-center center">
      <h2>Les dév du chantier de Pantin</h2>
      <hr>
    </div>
    <div class="categories">
      <ul class="cat">
        <li>
          <ol class="type">
            <li><a href="#" data-filter="*" class="active">Tout le monde</a></li>
            <li><a href="#" data-filter=".web">Les intégrateurs</a></li>
            <li><a href="#" data-filter=".app">Les développeurs</a></li>
            <li><a href="#" data-filter=".branding">Branding</a></li>
          </ol>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <div class="col-sm-6 col-md-3 col-lg-3 web">
          <div class="portfolio-item">
            <div class="hover-bg"> <!-- <a href="img/portfolio/01-large.jpg" title="Project description" rel="prettyPhoto"> -->
              <div class="hover-text" onclick="window.location='http://pmbaye.fr/';">
                <h4>Papaoumar Ndaye</h4>
                <small>Intégrateur</small> </div>
              <img src="img/portfolio/papaoumar.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 app">
          <div class="portfolio-item">
            <div class="hover-bg"> <!-- <a href="img/portfolio/02-large.jpg" title="Project description" rel="prettyPhoto"> -->
              <div class="hover-text" onclick="window.location='https://leslypm.net/';">
                <h4>Lesly Poujaud Melot</h4>
                <small>Developpeur</small> </div>
              <img src="img/portfolio/lesly.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 web">
          <div class="portfolio-item">
            <div class="hover-bg"> <!-- <a href="img/portfolio/03-large.jpg" title="Project description" rel="prettyPhoto"> -->
              <div class="hover-text" onclick="window.location='https://www.mtbenkherouf.com/';">
                <h4>Tarek Benkherouf </h4>
                <small>Intégrateur</small> </div>
              <img src="img/portfolio/tarek.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 web">
          <div class="portfolio-item">
            <div class="hover-bg"> <!-- <a href="img/portfolio/04-large.jpg" title="Project description" rel="prettyPhoto"> -->
              <div class="hover-text" onclick="window.location='http://kaslan.ma6tvacoder.org/ ';">
                <h4>Kilic Aslan </h4>
                <small>Intégrateur</small> </div>
              <img src="img/portfolio/kilic.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 app">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/05-large.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Le</h4>
                <small>Dév</small> </div>
              <img src="img/portfolio/05-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 branding">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/06-large.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <small>Branding</small> </div>
              <img src="img/portfolio/06-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 branding app">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/07-large.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <small>App Development, Branding</small> </div>
              <img src="img/portfolio/07-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 web">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/08-large.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                 <h4>Project Title</h4>
                <small>Web Design</small> </div>
              <img src="img/portfolio/08-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  -->
<div id="achievements" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>"Bien heureux celui qui fait un travail qu'il aime" <br><br> Edine-le-sage</h2>
      <hr>
    </div>
    <div class="row">
     </div>
</div>


<!-- ------------------------------------------------------------------------------------------->







<div id="resume" class="text-center">
    <div class="container">
      <div class="section-title center">
        <h2 style="color:black">Experiences professionnelles</h2>
        <hr>
      </div>
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">

          <?php
          $dialogue = $pdoCV->query("SELECT * FROM t_experiences ORDER BY dates DESC");   //je récupère les informations de la bdd
          while($info = $dialogue->fetch(PDO::FETCH_ASSOC)){ //je fetch les informations et je les parcours avec la boucle while
              $index = $info['id_experience']; //je stock l'idplayer dans une variable index
              if($index % 2 == 0) //si le reste de la division (index/2) est égal à 0 (c'est à dire un nombre paire) alors je lui associe la couleur rouge
              {
                  echo '
                  <li>
                    <div class="timeline-image">
                      <h4>'.$info['dates'].' </h4>
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>'.$info['titre'].'</h4>
                        <h4 class="subheading">'.$info['stitre'].'</h4>
                      </div>
                      <div class="timeline-body">
                        <p>'.$info['description'].'</p>
                      </div>
                    </div>
                  </li>
                  ';
              }else //si le reste de la division (index/2) est égal à 1 (c'est à dire un nombre impaire) alors je lui associe la couleur blueu
              {
                  echo '
                    <li class="timeline-inverted">
                      <div class="timeline-image">
                        <h4>'.$info['dates'].'</h4>
                      </div>
                      <div class="timeline-panel">
                        <div class="timeline-heading">
                          <h4>'.$info['titre'].'</h4>
                          <h4 class="subheading">'.$info['stitre'].'</h4>
                        </div>
                        <div class="timeline-body">
                          <p>'.$info['description'].'</p>
                        </div>
                      </div>
                    </li>
                  ';
              }
          }
          ?>

        </ul>
      </div>
    </div>
  </div>



<!-- ------------------------------------------------------------------------------------------->

<div id="resume" class="text-center">
    <div class="container">
      <div class="section-title center">
        <h2 style="color:black">Formations</h2>
        <hr>
      </div>
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">

          <?php
          $dialogue = $pdoCV->query("SELECT * FROM t_formations ORDER BY dates");   //je récupère les informations de la bdd
          while($info = $dialogue->fetch(PDO::FETCH_ASSOC)){ //je fetch les informations et je les parcours avec la boucle while
              $index = $info['id_formation']; //je stock l'idplayer dans une variable index
              if($index % 2 == 0) //si le reste de la division (index/2) est égal à 0 (c'est à dire un nombre paire) alors je lui associe la couleur rouge
              {
                  echo '
                  <li>
                    <div class="timeline-image">
                      <h4>'.$info['dates'].' </h4>
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>'.$info['titre'].'</h4>
                        <h4 class="subheading">'.$info['sous_titre'].'</h4>
                      </div>
                      <div class="timeline-body">
                        <p>'.$info['description'].'</p>
                      </div>
                    </div>
                  </li>
                  ';
              }else //si le reste de la division (index/2) est égal à 1 (c'est à dire un nombre impaire) alors je lui associe la couleur blueu
              {
                  echo '
                    <li class="timeline-inverted">
                      <div class="timeline-image">
                        <h4>'.$info['dates'].'</h4>
                      </div>
                      <div class="timeline-panel">
                        <div class="timeline-heading">
                          <h4>'.$info['titre'].'</h4>
                          <h4 class="subheading">'.$info['sous_titre'].'</h4>
                        </div>
                        <div class="timeline-body">
                          <p>'.$info['description'].'</p>
                        </div>
                      </div>
                    </li>
                  ';
              }
          }
          ?>

        </ul>
      </div>
    </div>
  </div>

  
  







<!-- Section  Contact+ -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Contact</h2>
      <hr>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <div class="col-md-4"> <i class="fa fa-map-marker fa-2x"></i>
        <p><?php echo $ligne_utilisateur['adresse'].'<br>'. $ligne_utilisateur['code_postal'].' '.$ligne_utilisateur['ville']; ?></p>
      </div>
      <div class="col-md-4"> <i class="fa fa-envelope-o fa-2x"></i>
        <p><?php echo $ligne_utilisateur['email']; ?></p>
      </div>
      <div class="col-md-4"> <i class="fa fa-phone fa-2x"></i>
        <p><?php echo $ligne_utilisateur['portable']; ?></p>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <h3>Laissez moi un message</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-default">Envoyez Message</button>
      </form>
      <div class="social">
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a href="https://github.com/jeanmarc1968"><i class="fa fa-github"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>Copyright &copy; 2018 Jean-Marc BON. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/easypiechart.js"></script> 
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jquery.counterup.js"></script> 
<script type="text/javascript" src="js/waypoints.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>