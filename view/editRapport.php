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
        <!-- ======================================================================================================= -->
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
                                
                                // =====================================================================================
                                // Type : text
                                if($fields[$k]["type"] == "text")
                                {
                                    $error = false;
                                    ?>
                                    <div class="col s4 offset-l3 input-field">
                                        <i class="material-icons prefix">edit</i>
                                        <input required type="text"
                                               name="<?= $k ?>"
                                               id="<?= $k ?>"
                                               value="<?= $fields[$k]["value"] ?>"
                                               class="validate">

                                        <label for="<?= $k ?>"><?= $fieldsLabel[$k] ?></label>
                                    </div>
                                    <?php
                                }
                                // =====================================================================================
    
                                // =====================================================================================
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
                                // =====================================================================================
    
                                // =====================================================================================
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
                                // =====================================================================================
                                
                                if($error == true)
                                {
                                    echo "Erreur Type";
                                }
                            ?>
                            <!-- =================================================================================== -->
                            <!-- Submit button -->
                            <div class="col s4">
                                <button class="btn waves-effect waves-light"
                                        type="submit"
                                        name="submit_<?= $k ?>"
                                        id="submit.<?= $k ?>"
                                        value="submit">
                                    Modifier <?= $fieldsLabel[$k] ?>
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <!-- =================================================================================== -->
                        </div>
        
                    </form>
                </div>
                
                <?php
            }
        ?>
        
    </div>
</body>