<?php
  if($page != "login")
  { ?>
    <nav class="navbar navbar-expand-lg bg-dark">
      <a class="navbar-brand text-white" href="#">Rapports</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link badge-dark" href="rapportType">Créer Rapport</a>
          </li>
          <li class="nav-item">
            <a class="nav-link badge-dark" href="myrapports">Mes rapports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link badge-dark" href="profil">Mon profil</a>
          </li>
        </ul>
        <a class="nav-link badge-danger" href="logout">Déconnexion</a>
      </div>
    </nav> <?php
  } ?>
