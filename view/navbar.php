<?php
  if($page != "login")
  { ?>

      <nav class="blue darken-2">
          <div class="nav-wrapper">
              <a href="rapportType" class="brand-logo">Rapports</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                  <li><a href="rapportType">Créer Rapport</a></li>
                  <li><a href="myrapports">Mes Rapports</a></li>
                  <li><a href="profil">Profil</a></li>
                  <li class="red darken-2"><a href="logout">Déconnexion</a></li>
              </ul>
          </div>
      </nav>
      
      <?php
  } ?>