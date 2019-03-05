<?php ob_start(); ?>
    
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Vincent Cotini">
        
        <title></title>
    
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
    
        <!-- Materialize CSS -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    </head>
    <body>
    <header>
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="./public/images/logo.png" alt="Decimale" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="main-title">Compte Rendu d'Intervention</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <content>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3>Rapport</h3>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        echo $rapport["date_rappport"];
                        echo "<br />";
                        echo $rapport["nom_client"];
                        echo "<br />";
                        echo $rapport["contact"];
                        echo "<br />";
                        echo $rapport["adresse"];
                        echo "<br />";
                        echo $rapport["cp"];
                        echo "<br />";
                        echo $rapport["ville"];
                    ?>
                </div>
            </div>
    
            <div class="row">
                <div class="col s12">
                    <h3>CRI</h3>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        echo $cri["ref_cri"];
                        echo "<br />";
                        echo $cri["probleme"];
                        echo "<br />";
                        echo $cri["details_presta"];
                        echo "<br />";
                        echo $cri["new_inter"];
                        echo "<br />";
                        echo $cri["commentaire"];
                    ?>
                </div>
            </div>
    
            <div class="row">
                <div class="col s12">
                    <h3>Dates</h3>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        foreach ($dates as $kDate => $vDate)
                        {
                            echo $dates[$kDate]["date_inter"];
                            echo "<br />";
                        }
                    ?>
                </div>
            </div>
    
            <div class="row">
                <div class="col s12">
                    <h3>Actions</h3>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        foreach ($actions as $kAction => $vAction)
                        {
                            echo $actions[$kAction]["libelle"] ." : ". $actions[$kAction]["desc_action"];
                            echo "<br />";
                        }
                    ?>
                </div>
            </div>
    
            <div class="row">
                <div class="col s12">
                    <h3>Reseau</h3>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        echo $reseau["nom_reseau"];
                        echo "<br />";
                    ?>
                </div>
            </div>
    
            <div class="row">
                <div class="col s12">
                    <h3>Etat</h3>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        echo $etat["desc_etat"];
                        echo "<br />";
                    ?>
                </div>
            </div>
    
            <div class="row">
                <div class="col s12">
                    <h3>Intervenants</h3>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        foreach ($inter as $kInter => $vInter)
                        {
                            echo $inter[$kInter]["prenom"]." ".$inter[$kInter]["nom"];
                        }
                    ?>
                </div>
            </div>
    
            <div class="row">
                <div class="col s12">
                    <h3>Rapport</h3>
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
                        {
                            foreach ($pieces as $kPiece => $vPiece)
                            {
                                echo $pieces[$kPiece]["ref_piece"];
                                echo "<br />";
                                echo $pieces[$kPiece]["details_piece"];
                                echo "<br />";
                                echo $pieces[$kPiece]["qte"];
                                echo "<br />";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </content>

    </body>
    </html>

<?php
    
    $pdfView = ob_get_contents();