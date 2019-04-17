<body>
    <div class="container">
        <br />
        <div class="row">
            <div class="col s12 l10 offset-l2">
                <h3>Modifier mot de passe de <?= $tech["prenom"]." ".$tech["nom"]; ?></h3>
            </div>
        </div>
        <br /><br />
        <div class="row">
            <form action="#" method="post" class="col s12 l10 offset-l2">
                <div class="row">
                    <div class="input-field col s12 l5 offset-l2">
                        <i class="material-icons prefix">edit</i>
                        <input type="password" id="mdp" name="mdp" />
                        <label for="mdp">Nouveau mot de passe</label>
                    </div>
                </div>
    
                <div class="row">
                    <div class="input-field col s12 l5 offset-l2">
                        <i class="material-icons prefix">edit</i>
                        <input type="password" id="mdp" name="confirm" />
                        <label for="mdp">Confirmez mot de passe</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col s12 l5 offset-l3">
                        <button class="btn waves-effect waves-light"
                                type="submit"
                                name="submit"
                                value="submit">
                            Valider
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    
        <?php
            if(isset($error))
            {
                if($error)
                { ?>
                    <div class="row">
                        <div class="col s12 l4 offset-l4 red">
                            <p>
                                <?php
                                    echo $error;
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
</body>