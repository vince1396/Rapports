<body>
    <div class="container">

        <div class="row">
            <div class="col s12 l9 offset-l3">
                <h1>Changer de mot de passe</h1>
            </div>
        </div>
        
        <div class="row">
            <form action="#" method="post" class="col s12 l6 offset-l3">
                <div class="row">
                    <div class="col s12 input-field">
                        <label for="oldmdp">Mot de passe actuel : </label>
                        <input type="password" name="oldmdp" id="oldmdp">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <label for="newmdp">Nouveau mot de passe :  </label>
                        <input type="password" name="newmdp" id="newmdp">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <label for="confirm">Confirmez le mot de passe : </label>
                        <input type="password" name="confirm" id="confirm">
                    </div>
                </div>
                <div class="row">
                    <div class="col s8 offset-s3 offset-l4">
                        <button class="btn waves-effect waves-light"
                                type="submit"
                                name="submit"
                                value="submit">Valider
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <?php
            if(isset($log))
            { ?>
                <div class="row ">
                    <div class="col s12 l6 offset-l3">
                        <div class="card-panel yellow">
                            <p><?= $log; ?></p>
                        </div>
                    </div>
                </div> <?php
            }
        ?>
    </div>