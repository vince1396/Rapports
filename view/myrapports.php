<body>
  <div class="container">
      <div class="row"></div>

      <div class="row">
          <div class="col s10 offset-s2 l8 offset-l4">
              <h1>Mes rapports</h1>
          </div>
      </div>
      
      <div class="row">
          <div class="col s12">
              <table class="stripped bordered center responsive-table">
                  <thead>
                  <tr>
                      <th>Référence</th>
                      <th>Client</th>
                      <th>Date</th>
                      <th>Afficher</th>
                      <th>Modifier</th>
                      <th>PDF</th>
                      <th>Supprimer</th>
                  </tr>
                  </thead>

                  <tbody>
                      <?php
                          $rapports = getRapports()->fetchAll();
                          
                          foreach ($rapports as $k => $v)
                          { ?>
                              <tr>
                                  <td><?= $rapports[$k]["ref_cri"]      ?></td>
                                  <td><?= $rapports[$k]["nom_client"]   ?></td>
                                  <td><?= $rapports[$k]["date_rapport"] ?></td>
                                  <td><a href="displayRapport-display-<?= $rapports[$k]["id_rapport"] ?>"><i class="material-icons">remove_red_eye</i></a></td>
                                  
                                  <td><i class="material-icons">edit</i></td>
                                  
                                  <td><a href="convertPdf-pdf-<?= $rapports[$k]["id_rapport"] ?>"><i class="material-icons">picture_as_pdf</i></td>
                                  
                                  <td>
                                      <a href="myrapports-delete-<?= $rapports[$k]["id_rapport"] ?>">
                                          <i class="material-icons">delete</i>
                                      </a>
                                  </td>
                              </tr> <?php
                          }
                      ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</body>