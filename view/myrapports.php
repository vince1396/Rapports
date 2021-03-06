<body>
  <div class="container">
      <div class="row"></div>

      <div class="row">
          <div class="col s10 offset-s2 l8 offset-l4">
              <h1>Mes rapports</h1>
          </div>
      </div>
    
      <?php
          if(isset($mailSent))
          {
              if($mailSent == true)
              {
                  ?>
                  <div class="row ">
                      <div class="col s12 l6 offset-l3">
                          <div class="card-panel green">
                              <p>Le rapport a bien été envoyé</p>
                          </div>
                      </div>
                  </div> <?php
              }
              else
              {
                  ?>
                  <div class="row ">
                      <div class="col s12 l6 offset-l3">
                          <div class="card-panel red">
                              <p>Le rapport n'a pas pu être envoyé</p>
                          </div>
                      </div>
                  </div> <?php
              }
          }
      ?>
      <?php
        if ($hasRapport)
        { ?>
            <div class="row">
                <div class="col s12">
                    <table class="stripped bordered center responsive-table">
                        <thead>
                            <tr>
                                <th>Référence       </th>
                                <th>Client          </th>
                                <th>Date            </th>
                                <th>Technicien      </th>
                                <th>Envoi mail</th>
                                <th>Modifier        </th>
                                <th>PDF             </th>
                                <th>Supprimer       </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach ($rapportsToDisplay as $k => $v)
                                { ?>
                                    <tr>
                                        <td><?= $rapportsToDisplay[$k]["ref_cri"]      ?>                    </td>
                                        <td><?= $rapportsToDisplay[$k]["nom_client"]   ?>                    </td>
                                        <td><?= $rapportsToDisplay[$k]["date_rapport"] ?>                    </td>
                                        <td><?= $rapportsToDisplay[$k]["prenom"]." ". $rapportsToDisplay[$k]["nom"] ?></td>
                                        <td>
                                            <a href="myrapports-display-<?= $rapportsToDisplay[$k]["id_rapport"] ?>">
                                                <i class="material-icons">email</i>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="editRapport-edit-<?= $rapportsToDisplay[$k]["id_rapport"] ?>">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="convertPdf-pdf-<?= $rapportsToDisplay[$k]["id_rapport"] ?>">
                                                <i class="material-icons">picture_as_pdf</i>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="myrapports-delete-<?= $rapportsToDisplay[$k]["id_rapport"] ?>"
                                               onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée ?'));">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr> <?php
                                } ?>
                        </tbody>
                    </table>
                </div>
            </div> <?php
        }
        else
        { ?>
            <div class="row">
                <div class="col s12 offset-s3 l12 offset-l5">
                    <p>Aucun rapport à afficher</p>
                </div>
            </div> <?php
        }
        ?>
  </div>
</body>