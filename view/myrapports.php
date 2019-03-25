<body>
  <div class="container">
      <div class="row"></div>

      <div class="row">
          <div class="col s10 offset-s2 l8 offset-l4">
              <h1>Mes rapports</h1>
          </div>
      </div>
      
      <?php
        if ($hasRapport == true)
        { ?>
            <div class="row">
                <div class="col s12">
                    <table class="stripped bordered center responsive-table">
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Technicien</th>
                                <th>Afficher</th>
                                <th>Modifier</th>
                                <th>PDF</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach ($rapports as $k => $v)
                                { ?>
                                    <tr>
                                        <td><?= $rapports[$k]["ref_cri"]      ?></td>
                                        <td><?= $rapports[$k]["nom_client"]   ?></td>
                                        <td><?= $rapports[$k]["date_rapport"] ?></td>
                                        <td><?= $rapports[$k]["prenom"]." ". $rapports[$k]["nom"] ?></td>
                                        <td><i class="material-icons">remove_red_eye</i></td>
                                        <!-- <a href="displayRapport-display- $rapports[$k]["id_rapport"]"></a> -->

                                        <td><i class="material-icons">edit</i></td>

                                        <td><a href="convertPdf-pdf-<?= $rapports[$k]["id_rapport"] ?>"><i class="material-icons">picture_as_pdf</i></td>

                                        <td>
                                            <a href="myrapports-delete-<?= $rapports[$k]["id_rapport"] ?>"
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