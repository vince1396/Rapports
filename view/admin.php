<body>
    <div class="container">
        
        <div class="row">
            <div class="col s10 offset-s2 l6 offset-l4">
                <h4>Ajouter/Supprimer des techniciens</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col s12">
                <table class="responsive-table striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Modifier Mdp</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            foreach ($techs as $k => $v)
                            { ?>
                                <tr>
                                    <td><?= $techs[$k]["nom"]; ?></td>
                                    <td><?= $techs[$k]["prenom"]; ?></td>
                                    <td>
                                        <a href="editPassword-<?= $techs[$k]["id_tech"]; ?>">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="admin-delete-<?= $techs[$k]["id_tech"]; ?>"
                                           onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet utilisateur ?'));">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr><?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="row"></div>
    
        <?php
            if(isset($log))
            { ?>
                <div class="row">
                    <div class="col s12 l3 offset-l5 red">
                        <p><?= $log; ?></p>
                    </div>
                </div> <?php
            }
        ?>
        
        <div class="row">
            <form action="#" method="post" class="col s12 l3 offset-l5 blue-border">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nom" name="nom">
                        <label for="nom">Nom :</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="prenom" name="prenom">
                        <label for="prenom">Prénom :</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" id="email" name="email">
                        <label for="email">Email :</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="mdp" name="mdp">
                        <label for="mdp">Mot de passe :</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="confirm" name="confirm">
                        <label for="confirm">Confirmez mot de passe :</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light"
                                type="submit"
                                name="submit"
                                value="submit">
                            Ajouter technicien
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</body>