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
                  <?php
                    if($session["lvl"] == 1)
                    { ?>
                        <li class="admin"><a href="admin">Admin</a></li> <?php
                    }
                  ?>
                  <li class="rapportType"><a href="rapportType">Créer Rapport</a></li>
                  <li class="myrapports"><a href="myrapports">Mes Rapports</a></li>
                  <li class="profil"><a href="profil"><?= $_SESSION["prenom"]." ".$_SESSION["nom"]; ?></a></li>
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
          <?php
              if($session["lvl"] == 1)
              { ?>
                  <li class="admin"><a href="admin" class="waves-effect"><i class="material-icons">build</i>Admin</a></li><?php
              }
          ?>
          <li class="rapportType"><a href="rapportType" class="waves-effect"><i class="material-icons">add_circle</i>Créer Rapport</a></li>
          <li><div class="divider"></div></li>
          <li class="myrapports"><a href="myrapports" class="waves-effect"><i class="material-icons">collections_bookmark</i>Mes Rapports </a></li>
          <li><div class="divider"></div></li>
          <li class="profil"><a href="profil" class="waves-effect"><i class="material-icons">account_circle</i> Profil </a></li>
          <li><div class="divider"></div></li>
          <li class="red darken-1"><a href="logout" class="waves-effect white-text"><i class="material-icons">close</i> Déconnexion</a></li>
      </ul>
    
      <?php
  } ?>
