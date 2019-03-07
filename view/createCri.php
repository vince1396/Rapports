<body>
    <div class="container">
        <?php if($error)
        { ?>
            <div class="row">
                <div class="col s12 l8 offset-l4 red">
                    <p>
                        <?php
                            echo $log;
                        ?>
                    </p>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="row">
            <form action="#" method="POST" id="formCri" class="col s12 l8 offset-l4">
                <!-- =============================================================================================== -->
                <!-- ========================================= Titre =============================================== -->
                <div class="row">
                    <div class="col s12">
                        <h3>Détails de l'intervention</h3>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ======================================== Référence ============================================ -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix ">edit</i>
                        <input required type="text" name="ref" id="ref" class="validate">
                        <label for="ref">Ma référence</label>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ======================================= Date Rapport ========================================== -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">event</i>
                        <label for="date_rapport">Date</label>
                        <input required type="text" name="date_rapport" id="date_rapport" class="datepicker">
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ======================================== Nom Client =========================================== -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">edit</i>
                        <input required type="text" name="nom_client" id="nom_client" class="validate">
                        <label for="nom_client">Client</label>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ======================================== Nom Contact ========================================== -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">edit</i>
                        <input required type="text" name="contact" id="contact" class="validate">
                        <label for="contact">Nom du contact</label>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ========================================= Adresse ============================================= -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">edit</i>
                        <input required type="text" name="adresse" id="adresse" class="validate">
                        <label for="adresse">Adresse Client</label>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ======================================== Code Postal ========================================== -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">edit</i>
                        <input required type="text" name="cp" id="cp" class="validate">
                        <label for="cp">Code Postal</label>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- =========================================== Ville ============================================= -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">edit</i>
                        <input required type="text" name="ville" id="ville" class="validate">
                        <label for="ville">Ville</label>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- =================================== Dates d'interventions ===================================== -->
                <div class="row">
                    <div class="col s12 l6" id="dateInterBorder">
                        <span id="spanDateInter">
                            <div class="row dateInterRow" id="dateInterRow">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">event</i>
                                    <label for="dateInter">Date(s) d'intervention(s)</label>
                                    <input required type="text" name="dateInter[]" class="datepicker" id="dateInter">
                                </div>
                            </div>
                        </span>
                        
                        <div class="row">
                            <div class="col s12">
                                <a class="btn-floating btn-small waves-effect waves-light blue" id="dateInterAdd">
                                    <i class="material-icons">add</i>
                                </a>

                                <a class="btn-floating btn-small waves-effect waves-light blue" id="dateInterRemove">
                                    <i class="material-icons">remove</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ======================================== Intervenants ========================================= -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">people</i>
                        <select required name="tech[]" id="tech" multiple>
                            <?php
                                foreach ($techs as $k => $v)
                                {
                                    echo "<option value=".$v['id_tech'].">".$v['prenom']." ".$v['nom']."</option>";
                                } ?>
                        </select>
                        <label for="tech"> Sélectionnez un ou plusieurs intervenants </label>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- =========================================== Réseau ============================================ -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">wifi</i>
                        <select required name="reseau" id="reseau">
                            <?php
                                foreach ($reseau as $k => $v)
                                {
                                    echo "<option value=".$v['id_reseau'].">".$v['nom_reseau']."</option>";
                                } ?>
                        </select>
                        <label for="reseau">Réseau concerné : </label>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ===================================== Problèmes rencontrés ==================================== -->
                <div class="row">
                    <div class=" input-field col s12 l6">
                        <i class="material-icons prefix">insert_comment</i>
                        <label for="probleme">Problèmes rencontrés</label>
                        <textarea name="probleme"
                                  id="probleme"
                                  class="materialize-textarea"></textarea>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ======================================== Détails Presta ======================================= -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">insert_comment</i>
                        <label for="detailPresta">Détails de la prestation</label>
                        <textarea required id="detailPresta" name="detailPresta" class="materialize-textarea"></textarea>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- =========================================== Actions =========================================== -->
                <div class="row">
                    <div class="col s12">
                        <div>
                            <h5><i class="material-icons prefix">done</i> Actions réalisées </h5><br />
                        </div>
                        <?php
                            $detect = new Mobile_Detect;
                            foreach ($actions as $k => $v)
                            {
                                echo "<input type='checkbox'
                                             name='actions[]'
                                             id=".$v['libelle']."
                                             value=".$v['id_action']." />
                                      <label class='labelActions inputAction'
                                             for=".$v['libelle'].">".$v['libelle']." : ".$v['desc_action']."</label>
                                             <br />";
                                
                                if ($detect->isMobile())
                                    echo "<br />";
                                
                            } ?>
                    </div>
                </div><br /><br />
                <!-- =============================================================================================== -->
                <!-- ======================================== PIECES A CHANGER ===================================== -->
                <div class="row">
                    <div class="col s12 l6 rowPieceAChanger">
                        <!-- ======================================================================================= -->
                        <!-- =============================== Titre Pièce à changer ================================= -->
                        <div class="row">
                            <div class="col s12">
                                <h3>Pièce(s) à changer ?</h3>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                        <!-- =============================== Switch Pièce à changer ================================ -->
                        <div class="row">
                            <div class="col s12 offset-l4 offset-s3">
                                <div class="switch">
                                    <label for="pieceAChanger" class="labelCri">
                                        Non
                                        <input name="pieceAChanger" id="pieceAChanger" type="checkbox">
                                        <span class="lever"></span>
                                        Oui
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                        <!-- ============================ Block to display if pieceAChanger ======================== -->
                        <div class="row" id="rowDisplayPiece">
                            <div id="insertClonedPiece" class="col s12">
                                <span id="clonePiece">
                                    <div class="row borderPiece">
                                        <div class="col s12">
                                            <!-- =================================================================== -->
                                            <!-- ========================== Counter Pieces ========================= -->
                                            <div class="row">
                                                <div class="col s12 l8 offset-l4 offset-s4">
                                                    <h5 class="pieceH5">Pièce 1</h5>
                                                </div>
                                            </div>
                                            <!-- =================================================================== -->
                                            <!-- ============================= Ref Piece =========================== -->
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">edit</i>
                                                    <input id="refPiece"
                                                           class="validate inputPiece"
                                                           type="text"
                                                           name="piece[0][refPiece]">
                                                    <label for="refPiece" class="labelCri">Référence : </label>
                                                </div>
                                            </div>
                                            <!-- =================================================================== -->
                                            <!-- =========================== Détails Pièce ========================= -->
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">edit</i>
                                                    <input id="detailPiece"
                                                           class="validate inputPiece"
                                                           type="text"
                                                           name="piece[0][detailPiece]">
                                                    <label for="detailPiece"
                                                           class="labelCri">Détails de l'article : </label>
                                                </div>
                                            </div>
                                            <!-- =================================================================== -->
                                            <!-- ============================ Quantité Pièce ======================= -->
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">edit</i>
                                                    <input id="qtePiece"
                                                           class="validate inputPiece"
                                                           type="number"
                                                           name="piece[0][qtePiece]"
                                                           min="1">
                                                    <label for="qtePiece" class="labelCri">Quantité : </label>
                                                </div>
                                            </div>
                                            <!-- =================================================================== -->
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                        <!-- ============================= Boutons Pieces ========================================== -->
                        <div class="row" id="buttonPiece">
                            <div class="col s12">
                                <a class="btn-floating btn-small waves-effect waves-light blue" id="addPiece">
                                    <i class="material-icons">add</i>
                                </a>
                                <a class="btn-floating btn-small waves-effect waves-light blue" id="removePiece">
                                    <i class="material-icons">remove</i>
                                </a>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                    </div>
                </div><br /><br />
                <!-- =============================================================================================== -->
                <!-- ====================================== Titre Conclusion ======================================= -->
                <div class="row">
                    <div class="col s12 l6 offset-l1">
                        <h3>Conclusion</h3>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ========================================= Etat Réseau ========================================= -->
                <div class="row">
                    <div class="col s12 l6 offset-l1">
                        <p>A l'issue de notre intervention le réseau est : </p>
                        <?php
                            foreach ($etat as $k => $v)
                            {
                                echo "<input checked
                                             id=".$v['id_etat']."
                                             type='radio'
                                             name='etatReseau'
                                             value=".$v['id_etat'].">
                                      <label class='labelCri' for=".$v['id_etat'].">".$v['desc_etat']."</label><br />";
                            } ?>
                    </div>
                </div><br /><br />
                <!-- =============================================================================================== -->
                <!-- =================================== Nouvelle Intervention ===================================== -->
                <div class="row">
                    <div class="col s12 l6 offset-l1">
                        <p>Nécessite une nouvelle intervention : </p>
                        <input type="radio" name="needInter" id="ouiInter" value="ouiInter">
                        <label class="labelCri" for="ouiInter">Oui</label>
                        <br />
                        <input type="radio" name="needInter" id="nonInter" value="nonInter" checked>
                        <label class="labelCri" for="nonInter">Non</label>
                    </div>
                </div><br /><br />
                <!-- =============================================================================================== -->
                <!-- ================================== Autres Commentaires ======================================== -->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">insert_comment</i>
                        <label for="commentaire">Autres commentaires éventuels : </label>
                        <textarea name="commentaire" id="commentaire" class="materialize-textarea"></textarea>
                    </div>
                </div>
                <!-- =============================================================================================== -->
                <!-- ========================================= Submit ============================================== -->
                <div class="row">
                    <div class="col s12 offset-s3 l6 offset-l2 submit">
                        <button class="btn waves-effect waves-light"
                                type="submit"
                                name="submit"
                                id="submit"
                                value="Valider">
                            Valider
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php if($error)
        { ?>
            <div class="row">
                <div class="col s12 l8 offset-l4 red">
                    <p>
                        <?php
                            echo $log;
                        ?>
                    </p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>