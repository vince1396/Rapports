<?php ob_start(); ?>
    
    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <style>
                .center {
                    margin-left: 30%;
                }
                .font {
                    font-size: larger;
                }
            </style>
        </head>
        
        <body>
            <div class="center">
                <p class="font">40-62 Rue du Général Malleret-joinville– Bureausud-  94400 Vitry Sur Seine</p>
                <p class="font">Tél : +33 (0)1 81 87 01 60 | Fax : +33 (0)9 70 63 01 74 </p>
                <p class="font">S.A.R.L de 80000€ - RCS : CRETEIL 482 419 686 – TVA N°  FR58482419686 - SIRET : 482 419 686 00043</p>
                <p><a href="www.decimale.net"> www.decimale.net</a></p>
            </div>
        </body>
    </html>

<?php
    $footer = ob_get_contents();
    ob_end_clean();
?>