<?php ob_start(); ?>
    
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Vincent Cotini">
        
        <title>CRI</title>
    
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
        <!-- Materialize CSS -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

        <style>
            .mainTitle {
                border: solid 5px red;
                border-radius: 10px 10px 10px 10px;
            }
            
            .blue-border {
               border: solid 1px dodgerblue;
            }
            
            .blue-border-left {
                border-left: solid 1px dodgerblue;
            }

            .blue-border-top {
                border-top: solid 1px dodgerblue;
            }

            .blue-border-bottom {
                border-bottom: solid 1px dodgerblue;
            }
            
            .jump {
                break-before: page;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
    <!-- =========================================================================================================== -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3 class="center-align blue-text mainTitle">Compte Rendu d'Intervention de Maintenance (CRI)</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- =========================================================================================================== -->
        <div class="container">
            <!-- =================================================================================================== -->
            <div class="row">
                <div class="col s12">
                    <p class="text-align">
                        Compte rendu d’intervention suite à notre prestation de maintenance
                        du site ci-dessous mentionné.
                    </p>
                </div>
            </div>
            <!-- =================================================================================================== -->
            <div class="row">
                <div class="col s12">
                    <h4>1 - Détails de l'intervention</h4>
                </div>
            </div>
            <!-- =================================================================================================== -->
            <div class="row blue-border">
                
                <div class="col s12 blue-border-bottom">
                    <p><?= $cri["ref_cri"]; ?></p>
                </div>
                <!-- =============================================================================================== -->
                <!-- =============================================================================================== -->
                <div class="col s6">
                    <div class="row">
                        <div class="col s12">
                            <h5 class="text-align">Adresse du site</h5>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <?= $rapport["nom_client"]; ?>
                            </p>
                            <p>
                                <?= $rapport["adresse"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <div class="col s6 blue-border-left">
                    <div class="row">
                        <div class="col s12">
                            <h5 class="text-align">Date(s) d'Intervention</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <?php
                                foreach ($dates as $kDate => $vDate)
                                {
                                    echo "<p>".$dates[$kDate]["date_inter"]."</p>";
                                } ?>
                        </div>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- =============================================================================================== -->
                <div class="col s6 blue-border-top">
                    <div class="row">
                        <div class="col s12">
                            <h5 class="text-align">Nom du contact site</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <?= $rapport["contact"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <div class="col s6 blue-border-left blue-border-top">
                    <div class="row">
                        <div class="col s12">
                            <h5 class="text-align">Nom(s) du/des intervenants Décimale</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <?php
                                foreach ($inter as $kInter => $vInter)
                                {
                                    echo "<p>".$inter[$kInter]["prenom"]." ".$inter[$kInter]["nom"]. "</p>";
                                } ?>
                        </div>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- =============================================================================================== -->
                <div class="col s12 blue-border-top">
                    <p><b>Réseau concerné : </b><?= $reseau["nom_reseau"]; ?></p>
                </div>
                <!-- =============================================================================================== -->
                <!-- =============================================================================================== -->
                <div class="col s12 blue-border-top ">
                    <div class="row">
                        <div class="col s12">
                            <h5>Problème(s) rencontré(s) : </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <?= $cri["probleme"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =============================================================================================== -->
            <!-- =============================================================================================== -->
            <div class="row blue-border jump">
                <div class="col s12 blue-border-bottom">
                    <div class="row">
                        <div class="col s12">
                            <h5>Détails de la prestation : </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <?= $cri["details_presta"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            <h5>Intervention(s) réalisée(s) par Décimale dans ce contexte :</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <?php
                                foreach ($actions as $kAction => $vAction)
                                {
                                    echo "<p>".$actions[$kAction]["libelle"] ." : ". $actions[$kAction]["desc_action"].
                                         "</p>";
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =================================================================================================== -->
            <div class="row">
                <div class="col s12">
                    <h4>2 - Pièces à changer</h4>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        if($pieces == "NULL")
                        {
                            echo "Aucune pièce à changer";
                        }
                        else
                        { ?>
                            <table class="striped centered">
                                <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Détails de l'article</th>
                                    <th>Quantité</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                    foreach ($pieces as $kPiece => $vPiece)
                                    { ?>
                                        <tr>
                                            <td><?= $pieces[$kPiece]["ref_piece"]; ?></td>
                                            <td><?= $pieces[$kPiece]["details_piece"]; ?></td>
                                            <td><?= $pieces[$kPiece]["qte"]; ?></td>
                                        </tr> <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <!-- =================================================================================================== -->
            <div class="row">
                <div class="col s12">
                    <h4>3 - Conclusion</h4>
                </div>
            </div>
            <div class="row blue-border">
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            <h5>A l'issue de note intervention, le réseau est :</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p><b><?= $etat["desc_etat"]; ?></b></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row blue-border">
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            <h5>Nécessite une nouvelle intervention : </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <?php
                                if($cri["newInter"] == "ouiInter")
                                {
                                    echo "<b>OUI</b>";
                                }
                                else
                                {
                                    echo "<b>NON</b>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row blue-border">
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            <h5>Autre(s) commentaire(s) éventuel(s) : </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p><?= $cri["commentaire"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- =================================================================================================== -->
    </body>
    </html>

<?php
    $pdfView = ob_get_contents();
    ob_end_clean();