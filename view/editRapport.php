<body>
    <div class="container">
        <div class="row"></div>
        
        <div class="row">
            <div class="col s10 offset-s2 l8 offset-l4">
                <h1>Modifier Rapport</h1>
            </div>
        </div>
    
        <div class="row"></div>
        
        <?php
            foreach($textInput as $k => $v)
            { ?>
                <div class="row">
                    <form action="#" method="post"
                          class="col s12">
            
                        <div class="row">
                            <div class="col s4 offset-l3 input-field">
                                <i class="material-icons prefix">edit</i>
                                <input required type="text"
                                       name="<?= $k ?>"
                                       id="<?= $k ?>"
                                       value="<?= $v ?>"
                                       class="validate">
                                
                                <label for="<?= $k ?>"><?= $textLabel[$k] ?></label>
                            </div>
                            
                            <div class="col s4">
                                <button class="btn waves-effect waves-light"
                                        type="submit"
                                        name="submitRapport"
                                        id="submit.<?= $k ?>"
                                        value="submitRapport">
                                    Modifier <?= $textLabel[$k] ?>
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
        
                    </form>
                </div>
                
                <?php
            }
        ?>
        
    </div>
</body>