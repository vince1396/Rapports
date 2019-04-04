<body>
    <div class="container">
        <div class="row"></div>
        <!-- ======================================================================================================= -->
        <!-- TITLE -->
        <div class="row">
            <div class="col s10 offset-s2 l8 offset-l4">
                <h1>Modifier Rapport</h1>
            </div>
        </div>
        <div class="row">
            <div class="col s12 l8 offset-l5">
                <p>Veuillez modifier les champs un par un svp</p>
            </div>
        </div>
        <!-- ======================================================================================================= -->
        <?php
            if(isset($log))
            { ?>
                <div class="row">
                    <div class="col s12 l6 offset-l3 red">
                        <p>
                            <?php
                                echo $log; ?>
                        </p>
                    </div>
                </div>
                <?php
            } ?>
        <!-- ======================================================================================================= -->
        <!-- ========== TABS =========== -->
        <div class="row">
            <!-- =================================================================================================== -->
            <!-- =========== TABS TITLES =========== -->
            <div class="col s12">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab col s3"><a class="blue-text text-darken-2" href="#general">Général</a></li>
                    <li class="tab col s3"><a class="blue-text text-darken-2" href="#dateInter">Date(s) d'intervention(s)</a></li>
                    <li class="tab col s3"><a class="blue-text text-darken-2" href="#actions">Actions Réalisées</a></li>
                    <li class="tab col s3"><a class="blue-text text-darken-2" href="#pieces">Pièces à changer</a></li>
                    <li class="tab col s3"><a class="blue-text text-darken-2" href="#addPiece">Ajouter une pièce</a></li>
                </ul>
            </div>
            <!-- =================================================================================================== -->
            <!-- =========== GENERAL UPDATES =========== -->
            <div id="general" class="col s12">
                
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <?php
                    foreach($fields as $k => $v)
                    { ?>
                        <div class="row">
                            <form action="#"
                                  method="post"
                                  class="col s12">

                                <div class="row">
                                    <?php
                                        $error = true;
                            
                                        // =============================================================================
                                        // Type : text
                                        if($fields[$k]["type"] == "text")
                                        {
                                            $error = false;
                                            ?>
                                            <div class="col s4 offset-l3 input-field">
                                                <i class="material-icons prefix">edit</i>
                                                <input <?php if($k != "adresse") { echo "";} ?>
                                                        type="text"
                                                        id="<?= $k ?>"
                                                        name="<?= $k ?>"
                                                        value="<?= $fields[$k]["value"] ?>"
                                                        class="validate">

                                                <label for="<?= $k ?>"><?= $fieldsLabel[$k] ?></label>
                                            </div>
                                            <?php
                                        }
                                        // =============================================================================
                            
                                        // =============================================================================
                                        // Type : date
                                        if ($fields[$k]["type"] == "date")
                                        {
                                            $error = false;
                                
                                            ?>
                                            <div class="col s4 offset-l3 input-field">
                                                <i class="material-icons prefix">edit</i>
                                                <input required type="text"
                                                       name="<?= $k ?>"
                                                       id="<?= $k ?>"
                                                       value="<?= $fields[$k]["value"] ?>"
                                                       class="datepicker">

                                                <label for="<?= $k ?>"><?= $fieldsLabel[$k] ?></label>
                                            </div>
                                            <?php
                                        }
                                        // =============================================================================
                            
                                        // =============================================================================
                                        // Type : TextArea
                                        if ($fields[$k]["type"] == "area")
                                        {
                                            $error = false;
                                
                                            ?>
                                            <div class="col s4 offset-l3 input-field">
                                                <i class="material-icons prefix">insert_comment</i>
                                                <label for="probleme"></label>
                                                <textarea name="<?= $k ?>"
                                                          id="<?= $k ?>"
                                                          class="materialize-textarea"
                                                    ><?= $fields[$k]["value"] ?>
                                                 </textarea>
                                            </div>
                                            <?php
                                        }
                                        // =============================================================================
                            
                                        if($error == true)
                                        {
                                            $log = "Erreur Type";
                                        }
                                    ?>
                                    <!-- =========================================================================== -->
                                    <!-- Submit button -->
                                    <div class="col s4">
                                        <button class="btn waves-effect waves-light"
                                                type="submit"
                                                name="submitGeneral"
                                                id="submit.<?= $k ?>"
                                                value="<?= $k ?>">
                                            Modifier <?= $fieldsLabel[$k] ?>
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                    <!-- =========================================================================== -->
                                </div>
                            </form>
                        </div>
                        <div class="row"></div>
                        <?php
                    }
                ?>
            </div>
            <!-- =================================================================================================== -->
            <!-- =========== DATES INTERVENTIONS =========== -->
            <div id="dateInter" class="col s12">
                <br><br><br>
                <div class="row">
                    <!-- =========================================================================================== -->
                    <!-- DELETE DATE -->
                    <div class="col s12 l6" id="deleteDates">
                        <!-- ======================================================================================= -->
                        <!-- TITLE -->
                        <div class="row">
                            <div class="col s12 l6 offset-l3">
                                <h5>Supprimer une date</h5>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                        <br><br>
                        <?php
                            foreach($dates as $k => $v)
                            { ?>
                                <!-- =============================================================================== -->
                                <div class="row">
                                    <div class="col s12 l6">
                                        <p><b><?= $dates[$k]["date_inter"]; ?></b></p>
                                    </div>
                                    <!-- =========================================================================== -->
                                    <div class="col s12 l6">
                                        <form action="#" method="post">
                                            <button class="btn waves-effect waves-light"
                                                    type="submit"
                                                    name="submitDeleteDate"
                                                    id=""
                                                    value="<?= $dates[$k]["date_inter"]; ?>">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- =============================================================================== -->
                                <?php
                            } ?>
                    </div>
                    <!-- =========================================================================================== -->
                    
                    <!-- =========================================================================================== -->
                    <!-- ADD DATE -->
                    <div class="col s12 l4 offset-l2">
                        <div class="row">
                            <div class="col s12 l6">
                                <h5>Ajouter une date</h5>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                        <br><br>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">event</i>
                                    <label for="date">Date</label>
                                    <input required type="text" name="date" id="date" class="datepicker">
                                </div>
                            </div>
                            <!-- =================================================================================== -->
                            <div class="row">
                                <div class="col s12 l6 offset-l2">
                                    <button class="btn waves-effect waves-light"
                                            type="submit"
                                            name="submitAddDate"
                                            id=""
                                            value="submit">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- =========================================================================================== -->
                </div>
            </div>
            <!-- =================================================================================================== -->
            <!-- =========== ACTIONS REALISEES =========== -->
            <div id="actions" class="col s12">
                Test 3
            </div>
            <!-- =================================================================================================== -->
            <!-- =========== PIECES A CHANGER =========== -->
            <div id="pieces" class="col s12">
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <?php
                    if($rep = $pieces->fetchAll())
                    {
                        $pieces = getTargetPieces($id_rapport)->fetchAll();
                        $i = 0;
            
                        foreach ($pieces as $k => $v)
                        {
                            $i++;
                            ?>
                            <div class="row" id="">
                                <div id="" class="col s12">
                                    <div class="row">
                                        <div class="col s12 l8 offset-l3">
                                            <!-- =================================================================== -->
                                            <!-- ========================== Counter Pieces ========================= -->
                                            <div class="row">
                                                <div class="col s12 l8 offset-l4 offset-s4">
                                                    <h5 class="">Pièce <?= $i; ?></h5>
                                                </div>
                                            </div>
                                            <!-- =================================================================== -->
                                            <!-- ============================= Ref Piece =========================== -->
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="input-field col s12 l8">
                                                        <i class="material-icons prefix">edit</i>
                                                        <input id="refPiece"
                                                               class="validate"
                                                               type="text"
                                                               name="ref"
                                                               value="<?= $pieces[$k]["ref_piece"]; ?>">
                                                        <label for="refPiece" class="">Référence : </label>
                                                    </div>

                                                    <input type="hidden"
                                                           name="id"
                                                           value="<?= $pieces[$k]["id_piece"]; ?>">

                                                    <div class="col s12 l4">
                                                        <button class="btn waves-effect waves-light"
                                                                type="submit"
                                                                name="submitPiece"
                                                                id=""
                                                                value="ref">
                                                            Modifier
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row"></div>
                                            <!-- =================================================================== -->
                                            <!-- =========================== Détails Pièce ========================= -->
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="input-field col s12 l8">
                                                        <i class="material-icons prefix">edit</i>
                                                        <input id="detailPiece"
                                                               class="validate"
                                                               type="text"
                                                               name="details"
                                                               value="<?= $pieces[$k]["details_piece"]; ?>">
                                                        <label for="detailPiece"
                                                               class="">Détails de l'article : </label>
                                                    </div>

                                                    <input type="hidden"
                                                           name="id"
                                                           value="<?= $pieces[$k]["id_piece"]; ?>">
                            
                                                    <div class="col s12 l4">
                                                        <button class="btn waves-effect waves-light"
                                                                type="submit"
                                                                name="submitPiece"
                                                                id=""
                                                                value="details">
                                                            Modifier
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row"></div>
                                            <!-- =================================================================== -->
                                            <!-- ============================ Quantité Pièce ======================= -->
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="input-field col s12 l8">
                                                        <i class="material-icons prefix">edit</i>
                                                        <input id="qtePiece"
                                                               class="validate"
                                                               type="number"
                                                               name="qte"
                                                               value="<?= $pieces[$k]["qte"]; ?>"
                                                               min="1">
                                                        <label for="qtePiece" class="labelCri">Quantité : </label>
                                                    </div>

                                                    <input type="hidden"
                                                           name="id"
                                                           value="<?= $pieces[$k]["id_piece"]; ?>">

                                                    <div class="col s12 l4">
                                                        <button class="btn waves-effect waves-light"
                                                                type="submit"
                                                                name="submitPiece"
                                                                id=""
                                                                value="qte">
                                                            Modifier
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row"></div>
                                            <!-- =================================================================== -->
                                            <!-- ============================= Delete piece ======================== -->
                                            <div class="row">
                                                <form action="#" method="post">
                                                    <div class="col s12 l4 offset-l3">
                                                        <button class="btn waves-effect waves-light red"
                                                                type="submit"
                                                                name="deletePiece"
                                                                id=""
                                                                value="<?= $pieces[$k]["id_piece"]; ?>"
                                                                onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette pièce ?'));">
                                                            Supprimer
                                                            <i class="material-icons right">delete</i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php
                        }
                    }
                    else
                    { ?>
                        <div class="row">
                            <div class="col s12 l3 offset-l6">
                                <p>Aucune pièce</p>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <!-- =================================================================================================== -->
            <!-- =========== AJOUTER PIECE =========== -->
            <div id="addPiece" class="col s12">
                
                <div class="row"></div>
                <div class="row"></div>
                
                <div class="row">
                    <form action="#" method="post" class="col s12 l8 offset-l3">
                        <!-- ======================================================================================= -->
                        <!-- ========== TITRE ========== -->
                        <div class="row">
                            <div class="col s12 l8 offset-l2">
                                <h3>Ajouter une pièce</h3>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                        
                        <div class="row"></div>
                        <div class="row"></div>

                        <!-- ======================================================================================= -->
                        <!-- ========== REFERENCE ========== -->
                        <div class="row">
                            <div class="input-field col s12 l7 offset-l1">
                                <i class="material-icons prefix">edit</i>
                                <input id="refPiece"
                                       class="validate"
                                       type="text"
                                       name="ref"
                                       value="">
                                <label for="refPiece" class="">Référence : </label>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->

                        <!-- ======================================================================================= -->
                        <!-- ========== DETAILS ========== -->
                        <div class="row">
                            <div class="input-field col s12 l7 offset-l1">
                                <i class="material-icons prefix">edit</i>
                                <input id="detailsPiece"
                                       class="validate"
                                       type="text"
                                       name="details"
                                       value="">
                                <label for="detailsPiece" class="">Détails de l'article : </label>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->

                        <!-- ======================================================================================= -->
                        <!-- ========== QUANTITÉ ========== -->
                        <div class="row">
                            <div class="input-field col s12 l7 offset-l1">
                                <i class="material-icons prefix">edit</i>
                                <input id="qtePiece"
                                       class="validate"
                                       type="number"
                                       min="1"
                                       name="qte"
                                       value="">
                                <label for="qtePiece" class="">Quantité : </label>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                        
                        <div class="row"></div>

                        <!-- ======================================================================================= -->
                        <!-- ========== SUBMIT ========== -->
                        <div class="row">
                            <div class="col s12 l4 offset-l3">
                                <button class="btn waves-effect waves-light"
                                        type="submit"
                                        name="submitAddPiece"
                                        id=""
                                        value="submitAddPiece">
                                    Ajouter pièce
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->
                        
                    </form>
                </div>
            </div>
        </div>
        <!-- ======================================================================================================= -->
        <?php
            if(isset($log))
            { ?>
                <div class="row">
                    <div class="col s12 l6 offset-l3 red">
                        <p>
                            <?php
                                echo $log; ?>
                        </p>
                    </div>
                </div>
                <?php
            } ?>
        
    </div>
</body>