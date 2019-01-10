<body>
    <p>createCri</p>
    <br />
    <br />
    <br />

    <form action="#" method="POST">

        <h2>Détails de l'intervention</h2><br />

        <label for="ref">Ma référence : </label>
        <input type="text" name="ref" id="ref"> <!-- $_POST['ref'] = *saisie* -->
        <br />

        <label for="date_rapport">Date : </label>
        <input type="date" name="date_rapport" id="date_rapport">
        <br />

        <label for="nom_client">Client : </label>
        <input type="text" name="nom_client" id="nom_client"><!-- $_POST['nom_client'] = *saisie* -->
        <br />

        <label for="contact">Nom du contact sur site : </label>
        <input type="text" name="contact" id="contact"><!-- $_POST['contact'] = *saisie* -->
        <br />

        <label for="adresse">Adresse : </label>
        <input type="text" name="adresse" id="adresse"><!-- $_POST['adresse'] = *saisie* -->
        <br />

        <label for="cp">Code postal : </label>
        <input type="text" name="cp" id="cp"><!-- $_POST['cp'] = *saisie* -->
        <br />

        <label for="ville">Ville : </label>
        <input type="text" name="ville" id="ville"><!-- $_POST['ville'] = *saisie* -->
        <br />

        <!-- =========================================================================== -->
        <label for="dateInter">Date(s) d'intervention : </label>
        <input type="date" name="dateInter" id="dateInter"><!-- Plusieurs dates -->
        <!-- =========================================================================== -->

        <br />

        <!-- =========================================================================== -->
        <label for="tech">Intervenants Decimale : </label> <!-- Select -->
        <select name="tech" id="tech"><!-- $_POST['tech'] = *selection* -->
            <?php
                foreach ($techs as $k => $v)
                {
                    echo "<option value=".$v['id_tech'].">".$v['prenom']." ".$v['nom']."</option>";
                } ?>
        </select>
        <!-- =========================================================================== -->

        <br />

        <label for="reseau">Réseau concerné : </label> <!-- Select -->
        <select name="reseau" id="reseau"><!-- $_POST['reseau'] = *selection* -->
            <?php
                foreach ($reseau as $k => $v)
                {
                    echo "<option value=".$v['id_reseau'].">".$v['nom_reseau']."</option>";
                } ?>
        </select>
        <br />

        <label for="detailPresta">Détails prestation : </label>
        <textarea name="detailPresta" id="detailPresta"></textarea><!-- $_POST['detailPresta'] = *saisie* -->
        <br />

        <label for="probleme">Problèmes rencontrés : </label>
        <textarea name="probleme" id="probleme"></textarea><!-- $_POST['probleme'] = *saisie* -->
        <br />

        <!-- ========================================================================== -->
        <?php
            foreach ($actions as $k => $v)
            {
                echo "<input type='checkbox' name=".$v['libelle']." id=".$v['libelle']." /><label for=".$v['libelle'].">".$v['libelle']." ".$v['desc_action']."</label><br />";
            }
        ?>
        <!-- ========================================================================== -->

        <br />
<!-- =================================================================================================================== -->
        <br /><h2>Pièces à changer</h2><br />

        <p>Pièce(s) à changer ?</p><br />
        <input type="radio" name="pieceAChanger" id="ouiPiece" value="ouiPiece">
        <label for="ouiPiece">Oui</label>
                                                              <!-- $_POST['pieceAChanger'] = ouiPiece ou nonPiece -->
        <input type="radio" name="pieceAChanger" id="nonPiece" value="nonPiece">
        <label for="nonPiece">Non</label>

        <br />
        <br />

        <label for="refPiece">Référence : </label>
        <input type="text" name="refPiece" id="refPiece"><!-- $_POST['refPiece'] = *saisie* -->
        <br />

        <label for="detailPiece">Détails de l'article : </label>
        <input type="text" name="detailPiece" id="detailPiece"><!-- $_POST['detailPiece'] = *saisie* -->
        <br />

        <label for="qtePiece">Quantité : </label>
        <input type="number" name="qtePiece" id="qtePiece"><!-- $_POST['qtePiece'] = *saisie* -->
        <br />

        <br />
        <br />
<!-- =================================================================================================================== -->
        <h2>Conclusion</h2><br />

        <p>A l'issue de notre intervention le réseau est : </p><br />
        <?php
            foreach ($etat as $k => $v)
            {
                echo "<input type='radio' name='etatReseau' id=".$v['id_etat']." value=".$v['id_etat']."><label for=".$v['id_etat'].">".$v['desc_etat']."</label><br />";
            }
        ?>


        <br />

        <p>Nécessite une nouvelle intervention : </p>
        <input type="radio" name="needInter" id="ouiInter" value="ouiInter">
        <label for="ouiInter">Oui</label>
        <input type="radio" name="needInter" id="nonInter" value="nonInter">
        <label for="nonInter">Non</label>

        <br />

        <label for="commentaire">Autres commentaires éventuels : </label>
        <textarea name="commentaire" id="commentaire"></textarea>
        <br />

        <input type="submit" name="submit" id="submit" value="Valider">
    </form>
</body>