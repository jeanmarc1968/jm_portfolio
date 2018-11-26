

<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a class="navbar-brand" href="index.php"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item"  href="formations.php">Formations</a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item"  href="competences.php">Compétences</a>
      </li>
      <li class="nav-item">
      <a class="dropdown-item" href="loisirs.php">Loisirs</a>
      </li>
      <li class="nav-item">
      <a class="dropdown-item" href="experiences.php">Expériences</a>
      </li>

        <li class="nav-item">
          <a class="nav-link" href="../admin/index.php?quitter=oui" title="<?php echo $ligne_utilisateur['prenom']; ?> déconnectez-vous !">Quitter<i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </div>
</nav>

  