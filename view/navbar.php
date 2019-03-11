<?php
  if($page != "login")
  { ?>

      <nav class="blue darken-2">
          <div class="nav-wrapper">
              <a href="#" data-activates="slide-out"
                 class="button-collapse hide-on-large-only">
                  <i class="material-icons">menu</i>
              </a>
              <a href="rapportType" class="brand-logo">Rapports</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                  <li><a href="rapportType">Créer Rapport</a></li>
                  <li><a href="myrapports">Mes Rapports</a></li>
                  <li><a href="profil"><?= $_SESSION["prenom"]." ".$_SESSION["nom"]; ?></a></li>
                  <li class="red darken-2"><a href="logout">Déconnexion</a></li>
              </ul>
          </div>
      </nav>
      
      <ul id="slide-out" class="side-nav hide-on-large-only">
          <div class="row blue darken-2">
              <div class="col s12 offset-s3">
                  <h2 class="white-text">Menu</h2>
              </div>
          </div>
          <li><a href="rapportType" class="waves-effect"><i class="material-icons">add_circle</i>Créer Rapport</a></li>
          <li><div class="divider"></div></li>
          <li><a href="myrapports" class="waves-effect"><i class="material-icons">collections_bookmark</i>Mes Rapports </a></li>
          <li><div class="divider"></div></li>
          <li><a href="profil" class="waves-effect"><i class="material-icons">account_circle</i> Profil </a></li>
          <li><div class="divider"></div></li>
          <li class="red darken-1"><a href="logout" class="waves-effect white-text"><i class="material-icons">cloud</i> Déconnexion</a></li>
      </ul>
    
      <?php
  } ?>